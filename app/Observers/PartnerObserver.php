<?php

namespace App\Observers;

use App\Partner;
use App\DeleteImages;

class PartnerObserver
{
    /**
     * Handle the partner "created" event.
     *
     * @param  \App\Partner  $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        //
    }

    public function updating(Partner $partner) {

        // Reordering images if it doesn't start with index 0
        $all_images = $partner->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $partner->images = $data;
                }
                break;
            }
        }
    }

    /**
     * Handle the partner "updated" event.
     *
     * @param  \App\Partner  $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        //
    }

    public function deleting(Partner $partner) {
        $deleteImages = new DeleteImages();
        $deleteImages($partner);
    }

    /**
     * Handle the partner "deleted" event.
     *
     * @param  \App\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "restored" event.
     *
     * @param  \App\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "force deleted" event.
     *
     * @param  \App\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        //
    }
}
