<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Building extends Model
{
	use Searchable;
    protected $guarded = [];

    public function employees()
    {
    	return $this->hasMany('App\Models\Employee');
    }
}
