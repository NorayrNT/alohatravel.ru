<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Armenia;

class ArmeniaComposer
{
    
    public $armenia;

    public function __construct(Armenia $armenia) {
        $this->armenia = $armenia;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $hayastan = $this->armenia->get();
        $view->with(compact('hayastan'));
    }
}