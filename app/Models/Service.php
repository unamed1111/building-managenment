<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function apartments()
    {
    	return $this->belongsToMany('App\Models\Apartment','apartment_services');
    }
}
