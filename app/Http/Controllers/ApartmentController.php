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

        if(isset($request->search)) 
        {
            $apartments = $this->service->search($request->search); 
        } else {
            $apartments = $this->service->getAll(['building']);
        }
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
        $apartment = $this->service->get($id,['residents','services','apartment_services_cost']);
        return view('apartments.show',compact('apartment','services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buildings = $this->buildingService->getAll();
        $apartment = $this->service->get($id);
        return view('apartments.edit',compact('apartment','buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        $this->service->update($request->except('_token'),$id);
        return redirect()->route('apartments.index');
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
        $this->service->addServices($request->only('services', 'qty'),$id);
        return back();
    } 

    public function getCostService($id, $month)
    {
        $detail_cost = $this->service->getCostService($id, $month);
        if($detail_cost == null)
        {
            return back()->with(['error' => 'Chưa có hóa đơn tháng này']);
        }
        return view('apartments.detail_service',compact('detail_cost'));
    }

    public function createCostService($id, $month)
    {
        $this->service->createCostService($id, $month);
        return back();
    }
    public function hoan_tat_thanh_toan($id)
    {
        $this->service->hoan_tat_thanh_toan($id);
        return back();
    }

    public function ajaxGetApartment(Request $request)
    {
        $data = $this->service->ajaxGetApartment($request->all());
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function costServiceIndex()
    {
        $cost_services = $this->service->getCostServceOfResident();
        // dd($cost_services);
        return view('resident_layout.cost_services.index',compact('cost_services'));
    }

    public function costServiceShow($month)
    {
        $detail_cost = $this->service->costServiceShow($month);
        if($detail_cost == null)
        {
            return back()->with(['error' => 'Chưa có hóa đơn tháng này']);
        }
        return view('resident_layout.cost_services.detail',compact('detail_cost'));
    }

    public function createAllCostService($month){
        $this->service->createAllCostService($month);
        return back();
    }

    public function getCostMonth($id, Request $request)
    {
        return redirect()->route('show_cost_service',['id'=> $id,'month' => $request->month]);
    }

    public function getCostMonthResident(Request $request)
    {
        return redirect()->route('residents.cost-service-show',['month' => $request->month]);
    }

}
