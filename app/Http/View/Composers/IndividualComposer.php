<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Individual;
use App\Parents;

class IndividualComposer
{
    
    public $individual;

    public function __construct(Individual $individual) {
        $this->individual = $individual;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $parent = new Parents;
        $individual = $this->individual->get();
        $individuals = $parent($individual);
        // dd($individuals);

        $view->with(compact('individuals'));
    }
}