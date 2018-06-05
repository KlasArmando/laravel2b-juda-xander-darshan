<?php

use Illuminate\Database\Seeder;

class MangaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mangas')->insert([
            'title' => 'TestManga',
            'chapters' => '25',
            'volumes' => 5,
            'description' => 'TestDescription',
            'published' => '2000-01-01'
        ]);
    }
}
