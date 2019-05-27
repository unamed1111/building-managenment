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

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('floor', 'like', $search)
                                ->orWhere('status', 'like', $search)
                                ->orWhere('owner_name', 'like', $search)
                                ->orWhere('phone', 'like', $search)
                                ->orWhere('acreage', 'like', $search);
        return $result->paginate(10);
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
        $a = explode('-',$month);
        $month_format = '20'.$a[1].'-'.$a[0].'-28';
        $amount = 0;
        foreach ($apartment->services as $key => $service) {
            if($service->pivot->registration_time < $month_format){
                $amount += $service->cost * $service->pivot->qty;
            }
        }
        $service_apartment_id = $apartment->apartment_services()->where('registration_time' ,'<', $month_format)->pluck('id')->toArray();
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
        $a = explode('-',$month);
        $month_format = '20'.$a[1].'-'.$a[0].'-28';
        $apartments = Apartment::all();
        foreach ($apartments as $key => $apartment) {
            $service_cost = $apartment->apartment_services_cost()->where('month',$month)->first();
            if($service_cost != null){
                continue;
            }
            $amount = 0;
            foreach ($apartment->services as $key => $service) {
                if($service->pivot->registration_time < $month_format){
                    $amount += $service->cost * $service->pivot->qty;
                }
            }
            $service_apartment_id = $apartment->apartment_services()->where('registration_time' ,'<', $month_format)->pluck('id')->toArray();
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
        // dd($cost);
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
        $cost_services = auth()->user()->userable->apartment->apartment_services_cost()->orderBy('month','DESC')->paginate(5);
        return $cost_services;
    }

    public function costServiceShow($month)
    {
        $apartment = auth()->user()->userable->apartment;
        $cost = $apartment->apartment_services_cost()->with('apartment','apartment.building','apartment.services')->where('month',$month)->first();
        return $cost;
    }

    public function thanhtoanonline($id, $type)
    {
        CostServiceApartment::find($id)->update([
            'payment_date' => date('y-m-d'),
            'status'=> $type // 0 chua tra, 1 nhan vien thu, 2 tra bang paypal,3 tra bằng vn Pay
        ]);        
        // $cost = CostServiceApartment::find($id)->with('apartment','apartment.building','apartment.services');
        return;
    }
}