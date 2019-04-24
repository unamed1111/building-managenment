<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Resident;
use App\Models\Report;
use App\Models\CostServiceApartment;
use App\Models\Maintenance;
use App\Models\Apartment;

class DataStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resident_count = Resident::all()->count();
        $report_count = Report::where('status',0)->count();
        $reports = Report::with('user')->orderBy('id','DESC')->take(4)->get();
        $user_count = User::all()->count();

        $month = $request->input('month','04-19');
        $a = explode('-', $month);
        $fullmonth = '20'.$a[1].'-'.$a[0].'-28';

        $startofMonth = \Carbon\Carbon::parse($fullmonth)->startofMonth();
        $endOfMonth = \Carbon\Carbon::parse($fullmonth)->endOfMonth();
        $ma = Maintenance::where('time_start', '>', $startofMonth)->where('time_start' ,'<', $endOfMonth)->get();
        $maintenance_cost = $ma->sum('cost');
        $cost_month = CostServiceApartment::with('apartment','apartment.services')->where('month',$month)->get();
        $cost_datra = collect($cost_month->where('status', '<>', 0)->all());
        $cost_chuatra = collect($cost_month->where('status', 0)->all());

        $count_datra = $cost_datra->count();
        $total_amount_datra = $cost_datra->sum('amount');
        $count_chuatra = $cost_chuatra->count();
        $total_amount_chuatra = $cost_chuatra->sum('amount');
        $cost_all = $cost_month->sum('amount');

        return view('data_statistics.index',compact('resident_count','report_count','user_count','reports','count_datra','total_amount_datra','count_chuatra','total_amount_chuatra','cost_all','maintenance_cost'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        $month = $request->input('month','04-19');
        $cost_month = CostServiceApartment::with('apartment','apartment.services')->where('month',$month)->get();

        $cost_datra = collect($cost_month->where('status', '<>', 0)->all());
        dd($cost_datra->count());
        $total_amount_datra = $cost_datra->sum('amount');

        $cost_chuatra = collect($cost_month->where('status', 0)->all());
        $total_amount_chuatra = $cost_chuatra->sum('amount');

        return view('data_statistics.statistics');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
