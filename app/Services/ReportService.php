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


    // 1 mean was read
    // 2 mean done
    public function changeStatus($id,$status)
    {
        $model = $this->get($id);
        $model->status = $status;
        return $model->save();
    }

    public function doneReport($id,$status,$result)
    {
        $model = $this->get($id);
        $model->status = $status;
        $model->result = $result;
        return $model->save();
    }

    public function getAllReportOfResident()
    {
        $reports = auth()->user()->reports()->orderBy('time','desc')->paginate(10);
        return $reports;
    }
}