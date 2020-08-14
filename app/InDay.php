<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class InDay extends Model
{
    protected $guarded = ['id'];

    public $data = ['images'];

    public $dir = '/uploads/images/tours/incoming';

    // Relation 
    public function inTours() {
        return $this->belongsTo("App\InTour","in_tour_id");
    }

    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

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

    // Global Scope
    protected static function boot()
    {
        parent::boot();
        $path = request()->path();
        if(strstr($path,'admin')) {
            true;
        }else {
            static::addGlobalScope('lang_id', function (Builder $builder) {
                $builder->where('lang_id',session('lang'));
            });
        }
    }
}
