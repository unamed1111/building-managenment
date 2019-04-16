<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Maintenance extends Model
{
	// use Searchable;
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
