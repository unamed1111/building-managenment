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
        $model->save();
        return $model;
    }

    public function getAllReportOfResident()
    {
        $reports = auth()->user()->reports()->orderBy('time','desc')->paginate(10);
        return $reports;
    }

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('title', 'like', $search)
                                ->orWhere('content', 'like', $search)
                                ->orWhere('time', 'like', $search)
                                ->orWhere('status', 'like', $search)
                                ->orWhere('result', 'like', $search);
        return $result->paginate(10);
    }

    public function getAll($relations = [])
    {
        return $this->model->with($relations)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate(10);
    }
}