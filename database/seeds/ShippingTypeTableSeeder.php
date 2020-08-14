<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_types')->insert([
            ['name'=>'passenger'],
            ['name'=>'luggage'],
        ]);
    }
}
