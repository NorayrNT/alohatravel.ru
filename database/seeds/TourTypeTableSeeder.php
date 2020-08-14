<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tour_types')->insert([
            ['title' => 'tours in armenia','main_id' => null, 'lang_id' => '1', 'desc' => 'discover armenia','url' => '/tours/incoming'],
            ['title' => 'туры в Армению','main_id' => '1', 'lang_id' => '2', 'desc' => 'откройте для себя Армению','url' => '/tours/incoming'],
            ['title' => 'outgoing tours','main_id' => null, 'lang_id' => '1', 'desc' => 'find the world within you ','url' => '/tours/outgoings'],
            ['title' => 'исходящие туры','main_id' => '3', 'lang_id' => '2', 'desc' => 'найди мир внутри себя','url' => '/tours/outgoings'],
            ['title' => 'individual tours','main_id' => null, 'lang_id' => '1', 'desc' => 'Fill your day with happiness ','url' => '/tours/individual'],
            ['title' => 'индивидуальные туры','main_id' => '5', 'lang_id' => '2', 'desc' => 'наполните свой день счастьем ','url' => '/tours/individual'],
            ['title' => 'extreme tours','main_id' => null, 'lang_id' => '1', 'desc' => 'make your journey unforgettable','url' => '/tours/extreme'],
            ['title' => 'экстремальные туры','main_id' => '7', 'lang_id' => '2', 'desc' => 'сделайте ваше путешествие незабываемым','url' => '/tours/extreme'],
        ]);
    }
}
