<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Services\ResidentService;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;
use App\Services\BuildingService;
use App\Role;

class ResidentController extends Controller
{
    private $buildingService;
    private $service;
    public function __construct(ResidentService $service,BuildingService $buildingService)
    {
        $this->service = $service;
        $this->buildingService = $buildingService;
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
            $residents = $this->service->search($request->search); 
        } else {
            $residents = $this->service->getAll(['user']);
        }
        return view('residents.index',compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = $this->buildingService->getAll();
        return view('residents.create',compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request->except('_token','building_id','floor'));
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
        $buildings = $this->buildingService->getAll();
        $resident = $this->service->get($id);
        return view('residents.edit',compact('resident','buildings'));
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
        $this->service->update($request->except('_token','_method','building_id','floor'),$id);
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
        $user = User::create([
                'email' => $resident->email,
                'password' => Hash::make('123456'), // default when create
                'software_user_id' => $resident->id ,
                'role' => 1 , // chưa chọn role
                'type' => 3, // Account type of cư dân
                'user_type' => 'App\Models\Resident'
            ]);
        $this->syncPermissions($user);
        
        return back()->with('success','Thêm tài khoản cho cư dân: ' . $resident->name.' thành công');
    }

    public function getInformation() 
    {
        return view('resident_layout.information');
    }

    private function syncPermissions($user)
    {
        // Get the submitted roles
        $roles = [ROLE_RESIDENT];
        $permissions = [];

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }
        $user->syncRoles($roles);

        return $user;
    }

}
