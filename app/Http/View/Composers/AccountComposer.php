<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\User;
use Auth;

class AccountComposer
{
    
    public $user;

    public function __construct(User $user) {
        if(Auth::check()) {
            $this->user = Auth::user();
        }
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = $this->user;
        
        $view->with(compact('user'));
    }
}