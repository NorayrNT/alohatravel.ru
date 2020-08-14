<?php

namespace App\Observers;

use App\Car;
use App\DeleteImages;

class CarObserver
{
    /**
     * Handle the car "created" event.
     *
     * @param  \App\Car  $car
     * @return void
     */
    public function created(Car $car)
    {
        //
    }

    /**
     * Handle the car "updating" event
     * 
     * @param \App\Car $car
     * @return void
     */
    public function updating(Car $car) {

        // Reordering images if it doesn't start with index 0
        $all_images = $car->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $car->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the car "updated" event.
     *
     * @param  \App\Car  $car
     * @return void
     */
    public function updated(Car $car)
    {
        //
    }

    /**
     * Handle the car "deleted" event.
     *
     * @param  \App\Car  $car
     * @return void
     */
    public function deleted(Car $car)
    {
        //
    }

    public function deleting(Car $car) {
        $deleteImages = new DeleteImages();
        $deleteImages($car);
    }

    /**
     * Handle the car "restored" event.
     *
     * @param  \App\Car  $car
     * @return void
     */
    public function restored(Car $car)
    {
        //
    }

    /**
     * Handle the car "force deleted" event.
     *
     * @param  \App\Car  $car
     * @return void
     */
    public function forceDeleted(Car $car)
    {
        //
    }
}
