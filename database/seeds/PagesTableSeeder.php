<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            ['main_id' => null, 'lang_id' => '1', 'title' => 'tours/incoming','seo_title'=> 'title','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 1, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'tours/outgoings','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 3, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'tours/individual','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 5, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'tours/extreme','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 7, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'services/rentals/apartments','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 9, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'services/rentals/cars','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 11, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'services/transportation','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 13, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'armenia','seo_title'=> 'title','ads' => '0'],
            ['main_id' => 15, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
            ['main_id' => null, 'lang_id' => '1', 'title' => 'about','seo_title'=> 'title','ads' => '1'],
            ['main_id' => 17, 'lang_id' => '2', 'title' => '','seo_title'=> 'title','ads' => '0'],
        ]);
    }
}
