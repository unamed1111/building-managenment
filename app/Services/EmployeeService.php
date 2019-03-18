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
}