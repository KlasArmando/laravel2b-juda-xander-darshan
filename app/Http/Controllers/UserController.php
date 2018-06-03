<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return view('user.create');
        }else{
            abort(404);
        }
    }

    public function store(){
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect('users');
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
            return view('user.edit', compact('user'));
        }else{
            abort(404);
        }
    }

    public function update(User $user){
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect('users');
    }

    public function delete(User $user){
        $user->delete();
        return redirect('users');
    }
}
