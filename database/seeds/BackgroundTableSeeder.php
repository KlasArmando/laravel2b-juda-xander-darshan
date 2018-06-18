<?php

use Illuminate\Database\Seeder;

class BackgroundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('backgrounds') -> insert ([
            'name' => 'Red',
            'color' => '#CB4335',
        ]);
        DB::table('backgrounds') -> insert ([
            'name' => 'Blue',
            'color' => '#4286f4',
        ]);
    }
}
