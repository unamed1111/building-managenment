<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\BaseService;

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

    public function addService($data)
    {
        $apartment = auth()->user()->userable->apartment;
        $date = \Carbon\Carbon::now()->toDateTimeString();
        $apartment->services()->attach($data['service_id'],['qty'=> $data['qty'],'registration_time' => $date, 'comment' => $data['comment']]);
        return;
    }
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