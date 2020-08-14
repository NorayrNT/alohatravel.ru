<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\TourType;
use App\Service;
use App\Parents;

class FooterComposer
{
    
    public $footerType,$footerService;

    public function __construct(TourType $footerType,Service $footerService) {
        $this->footerType = $footerType;
        $this->footerService = $footerService;
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
        $footerTypes = $this->footerType->get();
        $footerTypes = $parents($footerTypes);
        $footerServices = $this->footerService->get();
        $footerServices = $parents($footerServices);
        // dd($footerServices);
        $view->with(compact('footerTypes','footerServices'));
    }
}