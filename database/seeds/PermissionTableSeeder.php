f<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =
        [
            'role-list',
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',
            'manga-list',
            'manga-show',
            'manga-create',
            'manga-edit',
            'manga-archive',
            'manga-reuse',
            'manga-delete',
            'user-list',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete'
        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
