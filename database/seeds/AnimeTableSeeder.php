<?php

use Illuminate\Database\Seeder;

class AnimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animes') -> insert ([
            'title' => 'Bleach',
            'episodes' => 366,
            'description' => 'BANKAI',
            'aired' => '2001/05/12',
        ]);
    }
}
