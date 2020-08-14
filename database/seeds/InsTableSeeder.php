<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ins')->insert([
            ['main_id' => null,'lang_id' => '1','name' => 'classic tours','desc' => 'description','seo_title'=>'english title','slug'=>'classic_tous'],
            ['main_id' => 1,'lang_id' => '2','name' => 'классические туры','desc' => 'описание','seo_title'=>'russian title','slug'=>'classic_tous'],
            ['main_id' => null,'lang_id' => '1','name' => 'adventure tours','desc' => 'adventure description','seo_title'=>'english title','slug'=>'adventure_tous'],
            ['main_id' => 3,'lang_id' => '2','name' => 'приключенческие туры','desc' => 'описание','seo_title'=>'russian title','slug'=>'adventure_tous'],
        ]);
    }
}
