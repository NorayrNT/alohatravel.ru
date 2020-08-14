<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\About;

class AboutComposer
{
    
    public $abouts;

    public function __construct(About $abouts) {
        $this->abouts = $abouts;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $about = $this->abouts->first();
        $view->with(compact('about'));
    }
}