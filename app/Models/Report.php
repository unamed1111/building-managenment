<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	// use Searchable;
    protected $guarded = [];	
    protected $attributes = [
    	'status' => 0
    ]; 

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
