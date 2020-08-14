<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Shipping;
use App\Parents;

class PassengerComposer
{
    
    public $shipping;

    public function __construct(Shipping $shipping) {
        $this->shipping = $shipping;
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
        $this->shipping = $this->shipping->where('shipping_type','1')->get();
        $shippings = $parent($this->shipping);
        $view->with(compact('shippings'));
    }
}