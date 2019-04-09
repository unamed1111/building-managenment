<?php

namespace App\Services;

use App\Models\Apartment;
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
           $apartment->services()->attach($service,['registration_time' => $date, 'comment' => '1', 'quantity' => $data['quantity'][$key]]);
        }
        return;
    }
}