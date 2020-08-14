<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;
    
    public function checkLang() {
        return $this->id == session('lang') ? true : false;
    }
    
    // Relations
    public function outs() {
        return $this->hasMany('App\Out','lang_id');
    }

    public function outTours() {
        return $this->hasMany("App\OutTour","lang_id");
    }

    public function ins() {
        return $this->hasMany("App\In",'lang_id');
    }

    public function inTours() {
        return $this->hasMany("App\InTour",'lang_id');
    }

    public function extremes() {
        return $this->hasMany('App\Extreme','lang_id');
    }

    public function about() {
        return $this->hasMany("App\About",'lang_id');
    }

    public function contacts() {
        return $this->hasMany("App\Contact",'lang_id');
    }
    
    public function armenia() {
        return $this->hasMany("App\Armenia",'lang_id');
    }

    public function cars() {
        return $this->hasMany("App\Car",'lang_id');
    }
    
    public function individuals() {
        return $this->hasMany("App\Individual",'lang_id');
    }

    public function services() {
        return $this->hasMany("App\Service",'lang_id');
    }

    public function navs() {
        return $this->hasMany("App\Nav",'lang_id');
    }

    public function tourStatuses() {
        return $this->hasMany('App\TourStatus','lang_id');
    }


    public function whyWe() {
        return $this->hasMany('App\WhyWe','lang_id');
    }

    public function inDays() {
        return $this->hasMany('App\InDay','lang_id');
    }

    public function shippings() {
        return $this->hasMany('App\Shipping','lang_id');
    }
    
    public function pages() {
        return $this->hasMany('App\Page','lang_id');
    }
    
}
