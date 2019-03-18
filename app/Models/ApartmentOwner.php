<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentOwner extends Model
{
    protected $guarded = [];

    public function apartments()
    {
    	return $this->hasMany('App\Models\Apartment');
    }
}
