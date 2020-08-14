<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\TourType;
use App\Service;
use App\WhyWe;
use App\About;
use App\InTour;
use App\Parents;
use App\Currencies\Convert;

class IndexComposer
{
    
    public $services,$tourTypes,$whywe,$about,$inTours;

    public function __construct(Service $services, TourType $tourTypes,WhyWe $whywe,About $about,InTour $inTours) {
        $this->services = Service::get();
        $this->tourTypes = TourType::get();
        $this->whywe = WhyWe::get();
        $this->about = About::get();
        $this->inTours = InTour::get();
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
        $inTours = InTour::withoutGlobalScopes()->where('top',true)->take(8)->get();
        $ids = [];
        foreach($inTours as $item) {
            $ids[] = $item->id;
        }
        $new_tours = InTour::whereIn('main_id',$ids)->get();
        if(count($new_tours)) {
            $inTours = $parents($new_tours);
        }
        $inTours = $convert($inTours);
        $tourTypes = $parents($this->tourTypes);
        $services = $parents($this->services);
        $whywes = $this->whywe;
        $about = $parents($this->about);
        $view->with(compact('tourTypes','services','whywes','about','inTours'));
    }
}