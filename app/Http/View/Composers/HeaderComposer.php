<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Contact;
use App\Currency;
use App\Locale;
use App\Nav;
use App\SocialLink;
use App\Parents;

class HeaderComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $parents = new Parents;
        $contacts = Contact::get();
        $contacts = $parents($contacts);
        $currencies = Currency::get();
        $locales = Locale::get();
        $navs = Nav::orderBy('order','asc')->get();
        $socials = SocialLink::get();

        $view->with(compact('contacts','currencies','locales','navs','socials'));
    }
}