<?php

namespace App\Services;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Services\BaseService;

class BuildingService extends BaseService
{
    protected $model;

    public function __construct(Building $building)
    {
        parent::__construct($building);
    }
}