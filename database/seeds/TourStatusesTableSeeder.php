<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tour_statuses')->insert([
            ['main_id' => null,'lang_id' => '1','title' => 'new'],
            ['main_id' => 1,'lang_id' => '2','title' => 'новый'],
            ['main_id' => null,'lang_id' => '1','title' => 'featured'],
            ['main_id' => 2,'lang_id' => '2','title' => 'избранный'],
        ]);
    }
}
