<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Service extends Model
{
	use Searchable;
    protected $guarded = [];

    public function apartments()
    {
    	return $this->belongsToMany('App\Models\Apartment','apartment_services')->withPivot('registration_time', 'comment','quantity');
    }
}
