<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\In;
use App\InTour;

class TourComposer
{
    
    public $inTours,$ins;

    public function __construct(In $ins,InTour $inTours) {
        $this->ins = In::all();
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $ins = $this->ins->getParent();
        // dd($ins);
        $view->with(compact('ins',$this->ins));
    }
}