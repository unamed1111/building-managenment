<?php

namespace App\Services;

use App\Models\Resident;
use Illuminate\Http\Request;
use App\Services\BaseService;

class ResidentService extends BaseService
{
    protected $model;

    public function __construct(Resident $resident)
    {
        parent::__construct($resident);
    }
}