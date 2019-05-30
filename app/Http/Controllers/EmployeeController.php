<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\User;
use App\Role;

class EmployeeController extends Controller
{

    private $service;

    public function __construct(EmployeeService $service)
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
            $employees = $this->service->search($request->search); 
        } else {
            $employees = $this->service->getAll(['user']);
        }
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        
        $employee = $this->service->store($request->except('_token','add_account'));
        // tạo tài khoản cho nhân viên khi tạo dữ liệu nhân viên
        if($request->has('add_account')){
            $user = User::create([
                'email' => $request->input('email'),
                'password' => Hash::make('123456'), // default when create
                'software_user_id' => $employee->id ,
                'role' => 1 , // chưa chọn role
                'type' => $request->input('position') == 4 ? 1 : 2, // nếu position là ban quản lý thì type = bql ngược lại là nhân viên
                'user_type' => 'App\Models\Employee'
            ]);
            $this->syncPermissions($user);
        }
        return back()->with(['success' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->service->get($id);
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $this->service->update($request->all(),$id);
        return back()->with(['success' => 'Sửa thông tin thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return back()->with('success','Xóa thành công');
    }

    public function createAccount($id)
    {
        $employee = $this->service->get($id);
        $user = User::create([
                'email' => $employee->email,
                'password' => Hash::make('123456'), // default when create
                'software_user_id' => $employee->id ,
                'role' => 1 , // chưa chọn role
                'type' => $employee->position == 4 ? 1 : 2, // account type của nhân viên
                'user_type' => 'App\Models\Employee'
            ]);
        $this->syncPermissions($user);
        return back()->with('success','Thêm tài khoản cho nhân viên: ' . $employee->name.' thành công');

    }

    private function syncPermissions($user)
    {
        // Get the submitted roles
        if($user->type == 1) {
            $roles = [ROLE_MANAGER];
        } else {
            $roles = [ROLE_EMPLOYEE];
        }
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

    public function getInformation()
    {
        $user = auth()->user()->userable;
        return view('employees.information',compact('user'));
    }
}
