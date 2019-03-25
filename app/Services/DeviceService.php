<?php

namespace App\Services;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Services\BaseService;

class DeviceService extends BaseService
{
    protected $model;

    public function __construct(Device $device)
    {
        parent::__construct($device);
    }
}