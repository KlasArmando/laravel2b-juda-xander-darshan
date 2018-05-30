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
            'episodes_Total' => 366 ,
            'description' => 'koala',
            'aired' => '2001/05/12'

            ]);

    }
}
