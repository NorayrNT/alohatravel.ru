<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locales')->insert([
            ['title' => 'en','name' => 'english','symbol' => "uploads/images/default/lang/en.png"],
            ['title' => 'ru','name' => 'русский','symbol' => "uploads/images/default/lang/ru.png"],
        ]);
    }
}
