<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Authorizable;

class UserController extends Controller
{
    // use Authorizable;

	public function index(Request $request)
	{
		// if(isset($request->search)) $users = $this->service->search($request);
        $users = User::latest()->paginate(5);
		return view('users.index',compact('users'));
	}

	public function create()
	{
        $roles = Role::pluck('name', 'id');
		return view('users.create',compact('roles'));
	}

	public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        $user = User::create([
        	'email' => $request->input('email'),
	        'password' => Hash::make($request->input('password')), // secret
	        'software_user_id' => 1 ,
	        'role' => 1 ,
	        'type' => 1,
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
