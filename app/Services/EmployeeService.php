<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Services\BaseService;

class EmployeeService extends BaseService
{
    protected $model;

    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('name', 'like', $search)
                                ->orWhere('dob', 'like', $search)
                                ->orWhere('status', 'like', $search)
                                ->orWhere('position', 'like', $search)
                                ->orWhere('phone', 'like', $search)
                                ->orWhere('address', 'like', $search)
                                ->orWhere('email', 'like', $search);
        return $result->paginate(10);
    }

}