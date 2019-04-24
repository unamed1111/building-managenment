<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\User;
use App\Role;
use App\Authorizable;
use App\Services\EmployeeService;

class UserController extends Controller
{
    // use Authorizable;

    private $service;

    public function __construct(EmployeeService $service)
    {
        $this->service = $service;
    }

	public function index(Request $request)
	{
		// if(isset($request->search)) $users = $this->service->search($request);
        $users = User::latest()->paginate(5);
		return view('users.index',compact('users'));
	}

	public function create()
	{
        $roles = Role::pluck('name', 'id')->except(ROLE_ADMIN,ROLE_RESIDENT);
		return view('users.create',compact('roles'));
	}

	public function store(Request $request)
    {
        $request->position = in_array(ROLE_MANAGER, $request->roles) ? '4' : $request->position;
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);
        $employee = $this->service->store($request->only('email','phone','name','dob','address','position','gender'));
        $user = User::create([
        	'email' => $request->input('email'),
	        'password' => Hash::make($request->input('password')), // secret
	        'software_user_id' => $employee->id ,
            'role' => 1 , // chưa chọn role
            'type' => $request->input('position')== 4 ? 1 : 2,
            'user_type' => 'App\Models\Employee'

        ]);

        if($user){
            $this->syncPermissions($request, $user);
        }
        return back()->with(['success' => 'Lưu thành công']);
    }

	public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        flash()->success('User has been updated.');

        return redirect()->route('users.index');
    }

   
    public function destroy($id)
    {
         if ( Auth::user()->id == $id ) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }
        User::destroy($id);
        return back()->with('success','Xóa thành công');
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

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
