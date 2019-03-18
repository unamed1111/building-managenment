<?php

namespace App\Services;

use App\Models\ApartmentOwner;
use Illuminate\Http\Request;
use App\Services\BaseService;

class ApartmentOwnerService extends BaseService
{
    protected $model;

    public function __construct(ApartmentOwner $apartmentOwner)
    {
        parent::__construct($apartmentOwner);
    }
}