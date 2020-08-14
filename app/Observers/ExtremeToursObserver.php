<?php

namespace App\Observers;

use App\Extreme;
use App\DeleteImages;


class ExtremeToursObserver
{
    /**
     * Handle the extreme "created" event.
     *
     * @param  \App\Extreme  $extreme
     * @return void
     */
    public function created(Extreme $extreme)
    {
        //
    }

    public function updating(Extreme $extreme) {

        // Reordering images if it doesn't start with index 0
        $all_images = $extreme->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $extreme->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the extreme "updated" event.
     *
     * @param  \App\Extreme  $extreme
     * @return void
     */
    public function updated(Extreme $extreme)
    {
        //
    }

    /**
     * Handle the extreme "deleted" event.
     *
     * @param  \App\Extreme  $extreme
     * @return void
     */
    public function deleted(Extreme $extreme)
    {
        //
    }

    public function deleting(Extreme $extreme) {
        $deleteImages = new DeleteImages();
        $deleteImages($extreme);
    }

    /**
     * Handle the extreme "restored" event.
     *
     * @param  \App\Extreme  $extreme
     * @return void
     */
    public function restored(Extreme $extreme)
    {
        //
    }

    /**
     * Handle the extreme "force deleted" event.
     *
     * @param  \App\Extreme  $extreme
     * @return void
     */
    public function forceDeleted(Extreme $extreme)
    {
        //
    }
}
