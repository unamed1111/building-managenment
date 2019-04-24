<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\ReportRequest;
use Illuminate\Http\Request;
use App\Services\ReportService;

class ReportController extends Controller
{
    private $service;
    private $status = 1;
    private $doneStatus = 2;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if(isset($request->search)) 
        {
            $reports = $this->service->search($request->search); 
        } else {
            $reports = $this->service->getAll();
        }
        return view('reports.index',compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $this->service->store($request->all());
        return back()->with(['success' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->service->changeStatus($id,$this->status);
        $report = $this->service->get($id,'user');
        return view('reports.show',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = $this->service->get($id);
        return view('reports.edit',compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(ReportRequest $request,$id)
    {
        $this->service->update($request->all(),$id);
        return back()->with(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return back()->with('success','Xóa thành công');
    }

    public function doneReport(Request $request,$id)
    {
        $this->service->doneReport($id,$this->doneStatus,$request->result);
        return back()->with('success','Thành công');
    }


    public function reportIndex()
    {
        $reports = $this->service->getAllReportOfResident();
        return view('resident_layout.reports.index',compact('reports'));
    }

    public function reportStore(ReportRequest $request)
    {
        $this->service->store($request->all()); // use admin
        return back()->with(['success' => 'Lưu thành công']);
    }
}