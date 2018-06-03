<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Role extends Model
{
    $role = Role::create(['name' => 'admin']);
	$role = Role::create(['name' => 'user']);
	$role = Role::create(['name' => 'premium']);

	
}
