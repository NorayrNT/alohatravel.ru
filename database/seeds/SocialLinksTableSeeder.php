<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_links')->insert([
            ['address'=>'https://www.facebook.com/aloohatravel.ru/',
             'icon'=>'<i class="fab fa-facebook fa-lg wow zoomIn" data-wow-delay=".5s"></i>',             
            ],
            ['address'=>'https://www.instagram.com/alooha_travel/',
             'icon'=>'<i class="fab fa-instagram fa-lg wow zoomIn" data-wow-delay="1s"></i>',             
            ],
            ['address'=>'https://www.youtube.com/channel/UCOIJt3q85GaKx37AtTSouFA/videos',
             'icon'=>'<i class="fab fa-youtube fa-lg wow zoomIn" data-wow-delay="1.5s"></i>',             
            ],
            ['address'=>'https://vk.com/public197577389',
             'icon'=>'<i class="fab fa-vk fa-lg wow zoomIn" data-wow-delay="2s"></i>',             
            ],
            ['address'=>'https://ok.ru/group/59765376286955',
             'icon'=>'<i class="fab fa-odnoklassniki fa-lg wow zoomIn" data-wow-delay="2.5s"></i>',             
            ],
        ]);
    }
}
