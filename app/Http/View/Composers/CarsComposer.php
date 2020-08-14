<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Car;
use App\Parents;
use App\CarPrice;
use App\Currencies\Convert;

class CarsComposer
{
    
    public $car;

    public function __construct(Car $car) {
        $this->car = $car;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $parents = new Parents;
        $convert = new Convert;

        $cars = $this->car->get();
        $cars = $parents($cars);
        $cars = $convert($cars);
        $view->with(compact('cars'));
    }
}