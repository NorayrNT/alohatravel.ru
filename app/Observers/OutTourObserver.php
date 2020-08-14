<?php

namespace App\Observers;

use App\OutTour;
use App\DeleteImages;

class OutTourObserver
{
    /**
     * Handle the out tour "created" event.
     *
     * @param  \App\OutTour  $outTour
     * @return void
     */
    public function created(OutTour $outTour)
    {
        //
    }

    public function updating(OutTour $outTour) {

        // Reordering images if it doesn't start with index 0
        $all_images = $outTour->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $outTour->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the out tour "updated" event.
     *
     * @param  \App\OutTour  $outTour
     * @return void
     */
    public function updated(OutTour $outTour)
    {
        //
    }

    public function deleting(OutTour $outTour) {
        $deleteImages = new DeleteImages();
        $deleteImages($outTour);
    }

    /**
     * Handle the out tour "deleted" event.
     *
     * @param  \App\OutTour  $outTour
     * @return void
     */
    public function deleted(OutTour $outTour)
    {
        //
    }

    /**
     * Handle the out tour "restored" event.
     *
     * @param  \App\OutTour  $outTour
     * @return void
     */
    public function restored(OutTour $outTour)
    {
        //
    }

    /**
     * Handle the out tour "force deleted" event.
     *
     * @param  \App\OutTour  $outTour
     * @return void
     */
    public function forceDeleted(OutTour $outTour)
    {
        //
    }
}
