<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ApartmentOwner extends Model
{
	use Searchable;
    protected $guarded = [];

    public function apartments()
    {
    	return $this->hasMany('App\Models\Apartment');
    }
}
