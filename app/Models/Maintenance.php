<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee','employee_maintenances');
    }

    public function device()
    {
    	return $this->belongsTo('App\Models\Device');
    }
}
