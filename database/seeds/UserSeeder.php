<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ouranimelist.com',
            'password' => Hash::make('123456789'),
        ]);

        $users = factory(User::class, 50)->create();
        foreach ($users as $user){
            $user->assignRole('user');
        }
    }
}
