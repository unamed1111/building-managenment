<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];	
    protected $attributes = [
    	'status' => 0
    ]; 

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
