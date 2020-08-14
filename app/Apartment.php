<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $guarded = ['id'];

    public $dir = "/uploads/images/services/apartments";

    public $prices = ['price'];

    //Set images to array
    public function setImagesAttribute($images) {
        if(is_array($images)) {
            return $this->attributes['images'] = json_encode($images);
        }
    }

    //Get images attribute
    public function getImagesAttribute($images) {
        return json_decode($images,true);
    }

    // Render Icons In Apartments' page
    protected $amenities = [
        'wash' => "<i class='zmdi zmdi-washing-machine zmdi-hc-lg' data-toggle='tooltip' data-placement='top' title='washing machine'></i>",
        'wifi' => "<i class='zmdi zmdi-wifi-alt zmdi-hc-lg' data-toggle='tooltip' data-placement='top' title='wifi'></i>",
        'ac' => "<i class='fas fa-snowflake' data-toggle='tooltip' data-placement='top' title='air-conditioner'></i>",
        'satellite' => "<i class='fas fa-satellite-dish' data-toggle='tooltip' data-placement='top' title='sattelite'></i>",
        'elevator' => "<i class='zmdi zmdi-unfold-more' data-toggle='tooltip' data-placement='top' title='elevator'></i>",
    ];

    public function renderIcon($item) {
        foreach($this->amenities as $k => $val) {
            if($item->$k) {
                echo $val;
            }
        }        
    }
    
}

