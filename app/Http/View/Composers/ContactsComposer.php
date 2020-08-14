<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Contact;
use App\Parents;
use App\SocialLink;

class ContactsComposer
{
    
    public $contact,$social;

    public function __construct(Contact $contact,SocialLink $social) {
        $this->contact = $contact;
        $this->social = $social;
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

        $contacts = $this->contact->get();
        $all = $parents($contacts);
        $contacts = $parents($contacts);
        $socials = $this->social->get();
        $view->with(compact('contacts','socials'));
    }
}