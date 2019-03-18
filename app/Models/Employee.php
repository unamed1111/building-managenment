<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    protected $attributes = [
    	'type' => 1,
    	'building_id' => 1
    ];
}
