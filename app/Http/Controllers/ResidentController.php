<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Services\ResidentService;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    private $service;
    public function __construct(ResidentService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = $this->service->getAll(['user']);
        return view('residents.index',compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request->except('_token'));
        return back()->with(['success' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resident = $this->service->get($id);
        return view('residents.edit',compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->service->update($request->except('_token','_method'),$id);
        return back()->with('success','Sửa thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return back()->with('success','Xóa thành công');
    }

    public function createAccount($id)
    {
        $resident = $this->service->get($id);
        if(!$resident->email){
            return back()->with('success','Cư dân chưa có email, Cập nhật email trước khi cấp tài khoản');
        }
        User::create([
                'email' => $resident->email,
                'password' => Hash::make('123456'), // default when create
                'software_user_id' => $resident->id ,
                'role' => 1 , // chưa chọn role
                'type' => 3, // Account type of cư dân
                'user_type' => 'App\Models\Resident'
            ]);
        return back()->with('success','Thêm tài khoản cho nhân viên: ' . $resident->name.' thành công');
    }
}
