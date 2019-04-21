<?php

namespace App\Services;

use App\Models\Apartment;
use App\Models\CostServiceApartment;
use Illuminate\Http\Request;
use App\Services\BaseService;
use Carbon\Carbon;

class ApartmentService extends BaseService
{
    protected $model;

    public function __construct(Apartment $apartment)
    {
        parent::__construct($apartment);
    }

    public function addServices($data,$id)
    {
        $apartment = $this->get($id);
        $date = Carbon::now()->toDateTimeString();
        foreach($data['services'] as $key => $service)
        {
           $apartment->services()->attach($service,['qty'=> $data['qty'][$key],'registration_time' => $date, 'comment' => '1']);
        }
        return;
    }

    public function createCostService($id, $month)
    {

        $apartment = $this->get($id);
        $service_cost = $apartment->apartment_services_cost()->where('month',$month)->first();
        if($service_cost != null){
            return false;
        }
        $amount = 0;
        foreach ($apartment->services as $key => $service) {
            $amount += $service->cost * $service->pivot->qty;
        }
        $service_apartment_id = $apartment->apartment_services()->pluck('id')->toArray();
        // dd(json_encode($service_apartment_id));
        $apartment->apartment_services_cost()->create([
            'service_apartment_id' => json_encode($service_apartment_id),
            'month' => $month,
            'status'=> 0,
            'amount' => round($amount)
        ]);        
        return true;
    }

    public function createAllCostService($month)
    {
        // if($month > '04-20')

        $a = Carbon::parse($month);
        dd($a);
        $apartments = Apartment::all();
        foreach ($apartments as $key => $apartment) {
            $service_cost = $apartment->apartment_services_cost()->where('month',$month)->first();
            if($service_cost != null){
                continue;
            }
            $amount = 0;
            foreach ($apartment->services as $key => $service) {
                if(Carbon::parse($service->pivot->registration_time)->format('m-y') < $month)
                $amount += $service->cost * $service->pivot->qty;
            }
            $service_apartment_id = $apartment->apartment_services()->where('registration_time' < $month)->pluck('id')->toArray();
            // dd(json_encode($service_apartment_id));
            $apartment->apartment_services_cost()->create([
                'service_apartment_id' => json_encode($service_apartment_id),
                'month' => $month,
                'status'=> 0,
                'amount' => round($amount)
            ]);        
        }
        return ;
    }

    public function getCostService($id, $month)
    {
        $apartment = $this->get($id);
        $cost = $apartment->apartment_services_cost()->with('apartment','apartment.building','apartment.services')->where('month',$month)->first();
        return $cost;
    }

    public function hoan_tat_thanh_toan($id)
    {
        CostServiceApartment::find($id)->update([
            'payment_date' => date('y-m-d'),
            'status'=> 1, // 0 chua tra, 1 nhan vien thu, 2 tra bang paypal
            'employee_id' => auth()->user()->id
        ]);        
        $cost = CostServiceApartment::find($id)->with('apartment','apartment.building','apartment.services');
        return $cost;
    }

    public function ajaxGetApartment($data)
    {
        return $this->model->where('building_id',$data['building_id'])->where('floor',$data['floor'])->pluck('name','id')->toArray();
    }

    public function getCostServceOfResident()
    {
        $cost_services = auth()->user()->userable->apartment->apartment_services_cost()->paginate(1);
        return $cost_services;
    }

    public function costServiceShow($month)
    {
        $apartment = auth()->user()->userable->apartment;
        $cost = $apartment->apartment_services_cost()->with('apartment','apartment.building','apartment.services')->where('month',$month)->first();
        return $cost;
    }
}