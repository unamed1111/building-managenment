<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    protected $attributes = [
    	'type' => 1,
    	'building_id' => 1
    ];

    public function user()
    {
         return $this->morphOne('App\User', 'userable','user_type', 'software_user_id');
    }
    
    public function maintenances()
    {
        return $this->belongsToMany('App\Models\maintenances','employee_maintenances');
    }

    public function building()
    {
    	return $this->belongsTo('App\Models\Building');
    }
}
