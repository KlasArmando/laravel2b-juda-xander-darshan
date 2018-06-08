<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user2 = Auth::user();
        if ($user2->hasPermissionTo('user-list')){
            $users = User::all();
            return view('user.index', compact('users'));
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
        return redirect('users')
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
            'password' => 'required|string|min:6',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        $roles = request('roles') ? request('roles') : [];
        $user->syncRoles($roles);
        return redirect('users')
            ->with('success','User updated successfully');
    }

    public function delete(User $user){
        $user->delete();
        return redirect('users')->with('success','User deleted successfully');
    }
}
