<?php

namespace App\Observers;

use App\InTour;
use App\DeleteImages;


class InTourObserver
{
    /**
     * Handle the in tour "created" event.
     *
     * @param  \App\InTour  $inTour
     * @return void
     */
    public function created(InTour $inTour)
    {
        //
    }

    public function updating(InTour $inTour) {

        // Reordering images if it doesn't start with index 0
        $all_images = $inTour->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $inTour->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the in tour "updated" event.
     *
     * @param  \App\InTour  $inTour
     * @return void
     */
    public function updated(InTour $inTour)
    {
        //
    }

    /**
     * Handle the in tour "deleted" event.
     *
     * @param  \App\InTour  $inTour
     * @return void
     */
    public function deleted(InTour $inTour)
    {
        //
    }

    public function deleting(InTour $inTour) {
        $deleteImages = new DeleteImages();
        $deleteImages($inTour);
    }

    /**
     * Handle the in tour "restored" event.
     *
     * @param  \App\InTour  $inTour
     * @return void
     */
    public function restored(InTour $inTour)
    {
        //
    }

    /**
     * Handle the in tour "force deleted" event.
     *
     * @param  \App\InTour  $inTour
     * @return void
     */
    public function forceDeleted(InTour $inTour)
    {
        //
    }
}
