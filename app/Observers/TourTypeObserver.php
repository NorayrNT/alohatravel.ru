<?php

namespace App\Observers;

use App\TourType;
use App\DeleteImages;

class TourTypeObserver
{
    /**
     * Handle the tour type "created" event.
     *
     * @param  \App\TourType  $tourType
     * @return void
     */
    public function created(TourType $tourType)
    {
        //
    }

    public function updating(TourType $tourType) {

        // Reordering images if it doesn't start with index 0
        $all_images = $tourType->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $tourType->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the tour type "updated" event.
     *
     * @param  \App\TourType  $tourType
     * @return void
     */
    public function updated(TourType $tourType)
    {
        //
    }

    public function deleting(TourType $tourType) {
        $deleteImages = new DeleteImages();
        $deleteImages($tourType);
    }

    /**
     * Handle the tour type "deleted" event.
     *
     * @param  \App\TourType  $tourType
     * @return void
     */
    public function deleted(TourType $tourType)
    {
        //
    }

    /**
     * Handle the tour type "restored" event.
     *
     * @param  \App\TourType  $tourType
     * @return void
     */
    public function restored(TourType $tourType)
    {
        //
    }

    /**
     * Handle the tour type "force deleted" event.
     *
     * @param  \App\TourType  $tourType
     * @return void
     */
    public function forceDeleted(TourType $tourType)
    {
        //
    }
}
