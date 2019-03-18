<?php

namespace App\Services;

use App\Models\Apartment;
use App\Models\ApartmentOwner;
use Illuminate\Http\Request;
use App\Services\BaseService;

class ApartmentService extends BaseService
{
    protected $model;

    public function __construct(Apartment $apartment)
    {
        parent::__construct($apartment);
    }

    public function store($data)
    {
        $owner = ApartmentOwner::find($data['apartment_owner_id']);
        if($owner != null ){
            return $this->model->create($data);
        }
        return false;
    }

    public function addServices($data,$id)
    {
        $apartment = $this->get($id);
        foreach($data['services'] as $service)
        {
           $apartment->services()->attach($service,['registration_time' => '1996-02-02', 'comment' => '1']);
        }
        return;
    }
}