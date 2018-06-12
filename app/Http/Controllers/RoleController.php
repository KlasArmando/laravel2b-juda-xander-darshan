<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list');
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->hasPermissionTo('role-list')){
            $roles = Role::all();
            return view('role.index', compact('roles'));
        }else{
            abort(404);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->hasPermissionTo('role-create')){
            $permissions = Permission::all();
            return view('role.create',compact('permissions'));
        }else{
            abort(404);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:roles,name',
        ]);

        $role = new Role;
        $role->name = request('name');
        $role->save();
        if (!empty(request('permissions'))){
            $role->syncPermissions(request('permissions'));
        }

        return redirect()->route('role.index')
                         ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role->id)
            ->get();
        return view('role.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $user = Auth::user();
        if ($user->hasPermissionTo('role-edit')){
            $permissions = Permission::all();
            return view('role.edit',compact('role', 'permissions'));
        }else{
            abort(404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        $this->validate(request(), [
            'name' => 'required|unique:roles,name,'.$role->id,
        ]);

        $role->name = request('name');
        $role->save();
        if (!empty(request('permissions'))){
            $role->syncPermissions(request('permissions'));
        }

        return redirect()->route('role.index')
                         ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('roles')->with('success','Role deleted successfully');
    }
}
