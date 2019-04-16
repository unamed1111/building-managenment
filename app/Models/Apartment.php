<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Apartment extends Model
{
    // use Searchable;
    protected $guarded = [];

    public function building()
    {
    	return $this->belongsTo('App\Models\Building');
    }

    // public function owner()
    // {
    // 	return $this->belongsTo('App\Models\ApartmentOwner','apartment_owner_id');
    // }

    public function residents()
    {
    	return $this->hasMany('App\Models\Resident');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service','apartment_services')->withPivot('registration_time', 'comment','qty');
    }

    public function apartment_services()
    {
        return $this->hasMany('App\Models\ApartmentService','apartment_id');
    }

    public function apartment_services_cost()
    {
        return $this->hasMany('App\Models\CostServiceApartment','apartment_id');
    }
}
