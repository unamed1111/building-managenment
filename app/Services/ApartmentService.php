<?php

namespace App\Services;

use App\Models\Apartment;
use App\User;
use App\Models\CostServiceApartment;
use Illuminate\Http\Request;
use App\Services\BaseService;
use Carbon\Carbon;
use App\Notifications\PaymentNotification;
use App\Notifications\ServiceFeeNotification;

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

    // tạo hóa đơn tháng 
    public function createAllCostService($month)
    {
        $a = explode('-',$month);
        $month_format = '20'.$a[1].'-'.$a[0].'-28';
        $apartments = Apartment::all();
        foreach ($apartments as $key => $apartment) {
            $service_cost = $apartment->apartment_services_cost()->where('month',$month)->first();
            if($service_cost != null){
                // nếu đã có hóa đơn thì tiếp tục.
                continue;
            }
            // tính tổng giá dịch vụ
            $amount = 0;
            foreach ($apartment->services as $key => $service) {
                // nếu thời gian đăng kí dịch vụ là ở trong tháng. =>>> tính tiền dịch vụ vào tổng giá trị
                if($service->pivot->registration_time < $month_format){
                    $amount += $service->cost * $service->pivot->qty;
                }
            }
            // lấy các id dịch vụ đang sử dụng trong tháng, thời gian đăng kí phải nhỏ hơn tháng hiện tại.
            $service_apartment_id = $apartment->apartment_services()->where('registration_time' ,'<', $month_format)->pluck('id')->toArray();
            $cost = $apartment->apartment_services_cost()->create([
                'service_apartment_id' => json_encode($service_apartment_id),
                'month' => $month,
                'status'=> 0,
                'amount' => round($amount)
            ]);     
            foreach ($apartment->residents as $resident) {
                if($resident->user != null){
                    $resident->user->notify(new ServiceFeeNotification($cost)); 
                } 
            }
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
            'status'=> 1, // 0 chua tra, 1 nhan vien thu, 2 tra bang paypal,  3 thanh toan bang vnpay
            'employee_id' => auth()->user()->id
        ]);

        $cost = CostServiceApartment::find($id)->load('apartment','apartment.building','apartment.services');
        //noti
        $residents = Apartment::find($cost->apartment_id)->residents;
        foreach ($residents as $resident) {
            optional($resident->user) == null ? : $resident->user->notify(new PaymentNotification($cost)); 
        }
        $bqls = User::where('type', 1)->get();
        foreach ($bqls as $key => $bql) {
            $bql->notify(new PaymentNotification($cost));
        }
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
        $cost = CostServiceApartment::find($id);
        $cost->load('apartment','apartment.building','apartment.services');
        $residents = Apartment::find($cost->apartment_id)->residents;
        foreach ($residents as $resident) {
            if($resident->user != null){
                $resident->user->notify(new PaymentNotification($cost)); 
            } 
        }
        $bqls = User::where('type', 1)->get();
        foreach ($bqls as $key => $bql) {
            $bql->notify(new PaymentNotification($cost));
        }
        return;
    }
}