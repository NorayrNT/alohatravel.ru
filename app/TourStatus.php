<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourStatus extends Model
{
    protected $guarded = ['id'];

    protected $attributes = [
        'lang_id' => '1',
    ];

    public $timestamps = false;


    // Relations
    public function langs() {
        return $this->belongsTo("App\Locale","lang_id");
    }

    public function inTours() {
        return $this->hasMany("App\InTour",'status_id');
    }
}
