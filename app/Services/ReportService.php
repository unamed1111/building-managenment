<?php

namespace App\Services;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Services\BaseService;
use Auth;
use Carbon\Carbon;

class ReportService extends BaseService
{
    protected $model;

    public function __construct(Report $report)
    {
        parent::__construct($report);
    }

    public function store($data)
    {
    	$data['user_id'] = Auth::id();
    	$data['time'] = Carbon::now()->toDateTimeString();
    	return $this->model->create($data);
    }
}