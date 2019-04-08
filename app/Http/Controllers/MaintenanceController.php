<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Services\MaintenanceService;
use App\Services\EmployeeService;

class MaintenanceController extends Controller
{
    private $service;
    private $employeeService;

    public function __construct(MaintenanceService $service,EmployeeService $employeeService)
    {
        $this->service = $service;
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search)) $maintenances = $this->service->search($request);
        else $maintenances = $this->service->getAll();
        return view('maintenances.index',compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maintenance = $this->service->store($request->all());
        $this->service->changeDeviceStatus($maintenance->id,1);
        return back()->with(['success' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = $this->employeeService->getAll();
        $maintenance = $this->service->get($id,'employees');
        return view('maintenances.show',compact('maintenance','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance = $this->service->get($id);
        return view('maintenances.edit',compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->service->update($request->all(),$id);
        return back()->with(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->changeDeviceStatus($id,-1);
        $this->service->delete($id);
        return back()->with('success','Xóa thành công');
    }

    //End maintenance, add time_end to table by current day.
    public function endMaintenance($id)
    {
        $this->service->endMaintenance($id);
        $this->service->changeDeviceStatus($id,-1);
        return back();
    }

    // add employees to maintenance
    public function addEmployees(Request $request, $id)
    {
        $this->service->addEmployees($request->only('employees'),$id);
        return back();
    } 
}
