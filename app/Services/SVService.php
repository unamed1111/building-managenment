<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Notifications\RegisterServiceNotification;

class SVService extends BaseService
{
    protected $model;

    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

    public function getAllServiceOfReisident()
    {
    	$user_service = auth()->user()->userable->apartment->services;
    	return $user_service;
    }

    public function getAllServiceIDOfReisident()
    {
        $user_service_id = auth()->user()->userable->apartment->services->pluck('id')->toArray();
        return $user_service_id;
    }
    // cư dân đăng kí service
    public function addService($data)
    {
        $apartment = auth()->user()->userable->apartment;
        $now = \Carbon\Carbon::now()->format('d');
            if((int)($now) < 25) {
                $date = \Carbon\Carbon::now()->toDateTimeString();
                $message = 'Đã đăng kí dịch vụ';
            } else {
                $nextmonth = new \Carbon\Carbon('first day of next month');
                $date = $nextmonth->toDateTimeString();
                $message = 'Đăng kí dịch vụ. Phí dịch vụ sẽ chỉ được tính vào tháng tiếp theo';
            }
        $qty = $data['qty'] ? : 1;
        $result =$apartment->services()->attach($data['service_id'],['qty'=> $qty,'registration_time' => $date, 'comment' => $data['comment']]);
        $service = $this->get($data['service_id']);
        auth()->user()->notify(new RegisterServiceNotification($service));
        return $message;
    }
    // cư dân hủy đăng kí service
    public function deleteService($id)
    {
        $apartment = auth()->user()->userable->apartment;
        $apartment->services()->detach($id);
        return;
    }

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('cost', 'like', $search)
                                ->orWhere('description', 'like', $search);
        return $result->paginate(10);
    }
}