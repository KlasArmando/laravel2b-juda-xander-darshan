<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use HasRoles;
class Permission extends Model
{
    $permission = Permission::create(['name' => 'role-list']);
	$permission = Permission::create(['name' => 'role-show']);
	$permission = Permission::create(['name' => 'role-create']);
	$permission = Permission::create(['name' => 'role-edit']);
	$permission = Permission::create(['name' => 'role-delete']);
	$permission = Permission::create(['name' => 'manga-list']);
	$permission = Permission::create(['name' => 'manga-show']);
	$permission = Permission::create(['name' => 'manga-create']);
	$permission = Permission::create(['name' => 'manga-edit']);
	$permission = Permission::create(['name' => 'manga-delete']);
	$permission = Permission::create(['name' => 'user-list']);
	$permission = Permission::create(['name' => 'user-show']);
	$permission = Permission::create(['name' => 'user-create']);
	$permission = Permission::create(['name' => 'user-edit']);
	$permission = Permission::create(['name' => 'user-delete']);
}
