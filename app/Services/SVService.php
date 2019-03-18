<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\BaseService;

class SVService extends BaseService
{
    protected $model;

    public function __construct(Service $service)
    {
        parent::__construct($service);
    }
}