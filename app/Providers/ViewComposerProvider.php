<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['header.header','header.mobile-header','header.mobile-menu','layouts.footer','modals.contacts'],
            "App\Http\View\Composers\HeaderComposer"            
        );
        View::composer(
            ['index'],
            "App\Http\View\Composers\IndexComposer"
        );
        View::composer(
            ['tours.incoming','index'],
            "App\Http\View\Composers\TourComposer"
        );
        View::composer(
            ['armenia'],
            "App\Http\View\Composers\ArmeniaComposer"
        );
        View::composer(
            ['about'],
            "App\Http\View\Composers\AboutComposer"            
        );
        View::composer(
            ['contacts'],
            "App\Http\View\Composers\ContactsComposer"
        );
        View::composer(
            ['services.cars'],
            "App\Http\View\Composers\CarsComposer"
        );
        View::composer(
            ['tours.extreme'],
            "App\Http\View\Composers\ExtremeComposer"
        );
        View::composer(
            ['tours.individual'],
            "App\Http\View\Composers\IndividualComposer"
        );
        View::composer(
            ['layouts.transport.passenger'],
            "App\Http\View\Composers\PassengerComposer"
        );
        View::composer(
            ['tours.country-slide'],
            "App\Http\View\Composers\CountryComposer"
        );
        View::composer(
            ['armenia','about',"tours.incoming","tours.incoming-type",'tours.outgoing','tours.individual','tours.extreme',
                'services.apartments','services.cars','services.transport'
            ],
            "App\Http\View\Composers\PagesComposer"
        );
        View::composer(
            ['account'],
            "App\Http\View\Composers\AccountComposer"
        );
        View::composer(
            ['layouts.footer'],
            "App\Http\View\Composers\FooterComposer"
        );
        View::share('tour',null);

    }
}
