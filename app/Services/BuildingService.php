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

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('description', 'like', $search)
                                ->orWhere('phone', 'like', $search);
        return $result->paginate(10);
    }

}