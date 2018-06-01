<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create() {
        return view('user.create');
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
        return view('user.show', compact('user'));
    }

    public function edit(User $user){
        return view('user.edit', compact('user'));
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
