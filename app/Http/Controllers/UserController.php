<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list');
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $user2 = Auth::user();
        if ($user2->hasPermissionTo('user-list')){
            $users = User::paginate(10);
            return view('user.index', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }else{
            abort(404);
        }
    }

    public function create() {
        $user2 = Auth::user();
        if ($user2->hasPermissionTo('user-create')){
            $roles = Role::all();
            return view('user.create',compact('roles'));
        }else{
            abort(404);
        }
    }

    public function store(){
        $validatedData = request()->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        $roles = request('roles') ? request('roles') : [];
        $user->assignRole($roles);
        return redirect('admin-panel/users')
            ->with('success','User created successfully');
    }

    public function show(User $user){
        $user2 = Auth::user();
        if ($user2->hasPermissionTo('user-show')){
            return view('user.show', compact('user'));
        }else{
            abort(404);
        }
    }

    public function edit(User $user){
        $user2 = Auth::user();
        if ($user2->hasPermissionTo('user-edit')){
            $roles = Role::all();
            return view('user.edit', compact('user', 'roles'));
        }else{
            abort(404);
        }
    }

    public function update(User $user){
        $validatedData = request()->validate([
            'name' => 'required|string|max:255|unique:users,name,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'string|min:6|nullable',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        if(!empty(request('password'))){
            $user->password = Hash::make(request('password'));
        }
        $user->save();
        $roles = request('roles') ? request('roles') : [];
        $user->syncRoles($roles);
        return redirect('admin-panel/users')
            ->with('success','User updated successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('admin-panel/users')->with('success','User deleted successfully');
    }

    public function search(){
        $users = User::where('name', 'LIKE', '%' . request('name') . '%')->paginate(10);
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
