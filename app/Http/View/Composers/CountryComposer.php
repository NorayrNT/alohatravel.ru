<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Parents;
use App\Out;

class CountryComposer
{
    
    public $out;

    public function __construct(Out $out) {
        $this->out = $out;
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
        $countries = $this->out->get();
        
        $view->with(compact('countries'));
    }
}