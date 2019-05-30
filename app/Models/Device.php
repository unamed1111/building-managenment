<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Device extends Model
{
	// use Searchable;
    protected $guarded = [];

    public function maintenances()
    {
    	return $this->hasMany('App\Models\Maintenance');
    }

    public function building()
    {
        return $this->belongsTo('App\Models\Building');
    }
}
