<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Extreme;
use App\Parents;
use App\Currencies\Convert;

class ExtremeComposer
{
    
    public $extreme;

    public function __construct(Extreme $extreme) {
        $this->extreme = $extreme;
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

        $extremes = $this->extreme->get();
        $extremes = $parents($extremes);
        $extremes = $convert($extremes);
        $view->with(compact('extremes'));
    }
}