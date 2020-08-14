<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Armenia extends Model
{
    protected $table = 'armenia';

    public $timestamps = false;


    // Relations
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

    // Set global scope for language
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
