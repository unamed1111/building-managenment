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

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('dob', 'like', $search)
                                ->orWhere('passport', 'like', $search)
                                ->orWhere('email', 'like', $search)
                                ->orWhere('phone', 'like', $search);
        return $result->paginate(10);
    }
}