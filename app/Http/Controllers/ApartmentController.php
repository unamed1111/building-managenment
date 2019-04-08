<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Services\ApartmentService;
use App\Services\BuildingService;
use App\Services\SVService;
use App\Http\Requests\ApartmentRequest;

class ApartmentController extends Controller
{
    private $service;
    private $buildingService;
    private $sVService;

    public function __construct(ApartmentService $service,BuildingService $buildingService,SVService $sVService)
    {
        $this->service = $service;
        $this->buildingService = $buildingService;
        $this->sVService = $sVService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search)) $apartments = $this->service->search($request,['building','owner']);
        else $apartments = $this->service->getAll(['building','owner']);
        return view('apartments.index',compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = $this->buildingService->getAll();
        return view('apartments.create',compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartmentRequest $request)
    {
        $this->service->store($request->except('_token'));
        return back()->with(['success' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = $this->sVService->getAll();
        $apartment = $this->service->get($id,['residents','services']);
        return view('apartments.show',compact('apartment','services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
         $apartment = $this->service->get($id);
        return view('apartments.edit',compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return back()->with('success','Xóa thành công');
    }

    // add services to apartment
    public function addServices(Request $request, $id)
    {
        $this->service->addServices($request->only('services'),$id);
        return back();
    } 
}
