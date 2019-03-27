<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $guarded = [];

    public function maintenances()
    {
    	return $this->hasMany('App\Models\Maintenance');
    }
}
