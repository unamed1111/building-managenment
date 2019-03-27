<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class AccountController extends Controller
{
	public function index()
	{
		$accounts = User::all();
		return view('accounts.index',compact('accounts'));
	}

	public function create()
	{
		return view('accounts.create');
	}

	public function store(Request $request)
    {
        User::create([
        	'email' => $request->input('email'),
	        'password' => Hash::make($request->input('password')), // secret
	        'software_user_id' => 1 ,
	        'role' => 1 ,
	        'type' => $request->input('type')
        ]);
        return back()->with(['success' => 'Lưu thành công']);
    }

	public function edit($id)
    {
        // $account = User::find($id);
        // return view('apartments.edit',compact('account'));
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success','Xóa thành công');
    }
}
