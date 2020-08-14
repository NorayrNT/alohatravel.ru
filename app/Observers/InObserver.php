<?php

namespace App\Observers;

use App\In;
use App\DeleteImages;
use Illuminate\Support\Facades\Storage;

class InObserver
{
    /**
     * Handle the in "created" event.
     *
     * @param  \App\In  $in
     * @return void
     */
    public function created(In $in)
    {
        //
    }
    
    public function creating(In $in) {
        if($in->main_id !== null) {
            $slug = In::withoutGlobalScopes()->find($in->main_id)->slug;
            $slug  ? $in->slug = $slug : '';
        }elseif($in->slug == null) {
            $in->slug = str_replace(" ","_",$in->name);
        }
    }

    /**
     * Handle the in "updated" event.
     *
     * @param  \App\In  $in
     * @return void
     */
    public function updated(In $in)
    {
         //   
    }
    
    /**
     * Handle the in "updating" event
     * 
     * @param \App\In $in
     * @return void
     */
    public function updating(In $in) {
        if($in->main_id !== null) {
            $slug = In::withoutGlobalScopes()->find($in->main_id)->slug;
            $slug  ? $in->slug = $slug : '';
        }elseif($in->slug == null) {
            $in->slug = str_replace(" ","_",$in->name);
        }

        // Reordering images if it doesn't start with index 0
        $all_images = $in->images;
        $index = '0';
        $data = [];
        if(is_array($all_images) && !empty($all_images)) {
            foreach($all_images as $k => $val) {
                if($index == '0' && $k !== '0') {
                    foreach($all_images as $image) {
                        $data[] = $image;
                    }
                    $in->images = $data;
                }
                break;
            }
        }
    }
    
    /**
     * @param \App\In $in
     * @return void
     * 
     */
    
    public function deleting(In $in) {
        $deleteImages = new DeleteImages();
        $deleteImages($in);
     }


    /**
     * Handle the in "deleted" event.
     *
     * @param  \App\In  $in
     * @return void
     */
    public function deleted(In $in)
    {
        //
    }
    

    /**
     * Handle the in "restored" event.
     *
     * @param  \App\In  $in
     * @return void
     */
    public function restored(In $in)
    {
        //
    }

    /**
     * Handle the in "force deleted" event.
     *
     * @param  \App\In  $in
     * @return void
     */
    public function forceDeleted(In $in)
    {
        //
    }
}
