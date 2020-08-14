<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Collection;
use App\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {       
        // Add new  method in Collection for attaching parent attributes to child
        Collection::macro('getParent',function() {
           return $this->map(function($item) {
                return  $item = $item->getParent($item->id);
            });
        });

        // Register Observers
        \App\In::observe(\App\Observers\InObserver::class);
        \App\InTour::observe(\App\Observers\InTourObserver::class);
        \App\InDay::observe(\App\Observers\InDayObserver::class);
        \App\Car::observe(\App\Observers\CarObserver::class);
        \App\Apartment::observe(\App\Observers\ApartmentObserver::class);
        \App\Extreme::observe(\App\Observers\ExtremeToursObserver::class);
        \App\Service::observe(\App\Observers\ServiceObserver::class);
        \App\OutTour::observe(\App\Observers\OutTourObserver::class);
        \App\Individual::observe(\App\Observers\IndividualObserver::class);
        \App\User::observe(\App\Observers\UserObserver::class);
        \App\TourType::observe(\App\Observers\TourTypeObserver::class);

        Schema::defaultStringLength(191);
        
        
    }
}
