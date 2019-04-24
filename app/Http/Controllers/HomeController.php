<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Resident;
use App\Models\Report;
use App\Models\CostServiceApartment;
use App\Models\Maintaince;
use App\Models\Apartment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resident_count = Resident::all()->count();
        $report_count = Report::where('status',0)->count();
        $reports = Report::with('user')->orderBy('id','DESC')->take(4)->get();
        $user_count = User::all()->count();

        return view('dashboard',compact('resident_count','report_count','user_count','reports'));
    }

    public function getChangePassword(){
        return view('auth.passwords.changePassword');
    }

    public function postChangePassword(Request $request){
        $user = User::find(Auth::id());
        // dd($request->input('new_password') , $request->input('confirm_new_password'));
        if(Hash::check($request->input('password'), $user->getAuthPassword()) && $request->input('new_password') == $request->input('confirm_new_password') ){
            // dd(1);
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
        }
        return redirect()->route('home')->with('success','Thay đôi mật khẩu thành công');
    }
}
