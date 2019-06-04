<?php

namespace App\Services;

use App\Models\Building;
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

    public function search($search)
    {
        $search = '%'.$search.'%';
        $building = Building::where('name', 'like', $search)->get()->pluck('id');

        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('purchase_date', 'like', $search)
                                ->orWhere('supplier', 'like', $search)
                                ->orWhere('floor', 'like', $search)
                                ->orWhereIn('building_id', $building)
                                ->orWhere('status', 'like', $search);
        return $result->paginate(10);
    }

}