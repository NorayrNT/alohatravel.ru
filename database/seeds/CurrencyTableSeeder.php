<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['title' => 'usd','rate' => '1', 'symbol' => '&#36'],
            ['title' => 'rub','rate' => '72', 'symbol' => '&#8381'],
            ['title' => 'amd','rate' => '480', 'symbol' => '&#1423'],
        ]);
    }
}
