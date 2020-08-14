<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['main_id' => null,'lang_id' => '1','name'=>'car rental','desc'=>'desc on car rental','url'=>'/services/rentals/cars'],
            ['main_id' => null,'lang_id' => '2','name'=>'прокат автомобилей','desc'=>'прокат автомобилей','url'=>''],            
        ]);
    }
}
