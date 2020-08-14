<?php

namespace App\Observers;

use App\Individual;
use App\DeleteImages;

class IndividualObserver
{
    /**
     * Handle the individual "created" event.
     *
     * @param  \App\Individual  $individual
     * @return void
     */
    public function created(Individual $individual)
    {
        //
    }

    public function updating(Individual $individual) {

        // Reordering images if it doesn't start with index 0
        $all_images = $individual->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $individual->images = $data;
                }
                break;
            }
        }
    }
    
    /**
     * Handle the individual "updated" event.
     *
     * @param  \App\Individual  $individual
     * @return void
     */
    public function updated(Individual $individual)
    {
        //
    }

    public function deleting(Individual $individual) {
        $deleteImages = new DeleteImages();
        $deleteImages($individual);
    }

    /**
     * Handle the individual "deleted" event.
     *
     * @param  \App\Individual  $individual
     * @return void
     */
    public function deleted(Individual $individual)
    {
        //
    }

    /**
     * Handle the individual "restored" event.
     *
     * @param  \App\Individual  $individual
     * @return void
     */
    public function restored(Individual $individual)
    {
        //
    }

    /**
     * Handle the individual "force deleted" event.
     *
     * @param  \App\Individual  $individual
     * @return void
     */
    public function forceDeleted(Individual $individual)
    {
        //
    }
}
