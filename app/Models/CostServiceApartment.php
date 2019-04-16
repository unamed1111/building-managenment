<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class CostServiceApartment extends Model
{
	protected $guarded = [];
   // use Searchable;
   // protected $attributes = ['service_apartment_id' => 1];
   public function apartment()
   {
   		return $this->belongsTo(Apartment::Class,'apartment_id');
   }

   public function employee()
   {
   		return $this->belongsTo(Employee::Class,'employee_id');
   }
}
