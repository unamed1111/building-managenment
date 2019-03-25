<?php

namespace App\Services;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Services\BaseService;

class MaintenanceService extends BaseService
{
    protected $model;

    public function __construct(Maintenance $maintenance)
    {
        parent::__construct($maintenance);
    }
}