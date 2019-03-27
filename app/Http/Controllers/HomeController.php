<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        return view('layouts.master');
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
