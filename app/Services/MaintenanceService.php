<?php

namespace App\Services;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Services\BaseService;
use Carbon\Carbon;

class MaintenanceService extends BaseService
{
    protected $model;

    public function __construct(Maintenance $maintenance)
    {
        parent::__construct($maintenance);
    }

    public function endMaintenance($id)
    {
    	$timeEnd = Carbon::now()->toDateTimeString();
    	$model = $this->get($id);
        return $model->update([
            'time_end' => $timeEnd
        ]);
    }

    public function addEmployees($data,$id)
    {
        $maintenance = $this->get($id);
        $date = Carbon::now()->toDateTimeString();
        foreach($data['employees'] as $employee)
        {
           $maintenance->employees()->attach($employee);
        }
        return;
    }

    public function changeDeviceStatus($id,$value)
    {
        $model = $this->get($id,['device']);
        $model->device->status += $value;
        $model->device->time_maintenance_period = $model->time_end;
        $model->device->save();
        return;
    }

    public function search($search)
    {
        $search = '%'.$search.'%';
        $result = $this->model->where('description', 'like', $search)
                                ->orWhere('time_start', 'like', $search)
                                ->orWhere('time_end', 'like', $search)
                                ->orWhere('cost', 'like', $search);
        return $result->paginate(10);
    }
}