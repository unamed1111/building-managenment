<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ApartmentService extends Model
{
	protected $guarded = [];
    // use Searchable;
    protected $attributed = ['qty' => 1];
}
