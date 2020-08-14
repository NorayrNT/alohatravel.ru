<?php

namespace App\Observers;

use App\InDay;
use App\DeleteImages;


class InDayObserver
{
    /**
     * Handle the in day "created" event.
     *
     * @param  \App\InDay  $inDay
     * @return void
     */
    public function created(InDay $inDay)
    {
        //
    }

    public function updating(InDay $inDay) {

        // Reordering images if it doesn't start with index 0
        $all_images = $inDay->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $inDay->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the in day "updated" event.
     *
     * @param  \App\InDay  $inDay
     * @return void
     */
    public function updated(InDay $inDay)
    {
        //
    }

    public function deleting(InDay $inDay) {
        $deleteImages = new DeleteImages();
        $deleteImages($inDay);
    }

    /**
     * Handle the in day "deleted" event.
     *
     * @param  \App\InDay  $inDay
     * @return void
     */
    public function deleted(InDay $inDay)
    {
        //
    }

    /**
     * Handle the in day "restored" event.
     *
     * @param  \App\InDay  $inDay
     * @return void
     */
    public function restored(InDay $inDay)
    {
        //
    }

    /**
     * Handle the in day "force deleted" event.
     *
     * @param  \App\InDay  $inDay
     * @return void
     */
    public function forceDeleted(InDay $inDay)
    {
        //
    }
}
