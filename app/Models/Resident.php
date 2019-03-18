<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $guarded = [];

    public function apartment()
    {
    	return $this->belongsTo('App\Models\Apartment');
    }
}
