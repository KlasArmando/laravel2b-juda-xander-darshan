<?php

use Illuminate\Database\Seeder;
use App\Anime;

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
            'title' => 'Test anime',
            'episodes' => 24,
            'description' => 'Test',
            'aired' => '2001/05/12',
        ]);
        $anime = factory(Anime::class, 50)->create();
    }
}
