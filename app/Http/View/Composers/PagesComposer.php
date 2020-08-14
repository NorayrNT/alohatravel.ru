<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Page;
use App\Parents;

class PagesComposer
{
    
    public $page,$title;

    public function __construct(Page $page) {
        $this->page= $page;
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
        $this->page = $this->page->get();
        $pages = $parent($this->page);
        $current = '';
        foreach($pages as  $k => $val) {
            if(request()->path() === $val->title) {
                // dd('equals');
                $current = $pages[$k];
            }
        }
        $view->with(compact('current'));
    }
}