<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ServicesTableSeeder::class,
            // ContactTableSeeder::class,
            // InsTableSeeder::class,
            LanguageTableSeeder::class,
            CurrencyTableSeeder::class,
            TourStatusesTableSeeder::class,
            SocialLinksTableSeeder::class,
            TourTypeTableSeeder::class,
            ShippingTypeTableSeeder::class,
            PagesTableSeeder::class
        ]);
    }
}
