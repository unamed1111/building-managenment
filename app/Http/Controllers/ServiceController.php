<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\SVService;

class ServiceController extends Controller
{

    private $service;

    public function __construct(SVService $service)
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
            $services = $this->service->search($request->search); 
        } else {
            $services = $this->service->getAll();
        }
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request->all());
        return back()->with(['success' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = $this->service->get($id,'apartments');
        $apartments = $service->apartments()->paginate(10);
        return view('services.show',compact('service','apartments')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = $this->service->get($id);
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->service->update($request->all(),$id);
        return back()->with(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return back()->with('success','Xóa thành công');
    }

    public function serviceIndex()
    {
        $services = $this->service->getAll();
        $user_services = $this->service->getAllServiceOfReisident();
        $user_services_id = $this->service->getAllServiceIDOfReisident();
        return view('resident_layout.services.index',compact('services','user_services','user_services_id'));
    }

    // cư dân đăng kí services
    public function serviceStore(Request $request)
    {
        $this->service->addService($request->all());
        return redirect()->back();
    }
    public function serviceDelete($id)
    {
        $this->service->deleteService($id);
        return redirect()->back();
    }
}
