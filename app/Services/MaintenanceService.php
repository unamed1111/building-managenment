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
        $model->device->save();
        return;
    }
}