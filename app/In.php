<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class In extends Model
{
    protected $guarded = ['id'];
    
    // Parent attributes
    public $data = ['images','slug'];

    // Upload directory
    public $dir = "/uploads/images/tours/ins";

    // Relations
    public function inTours() {
        return $this->hasMany('App\InTour','in_id');
    }

    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

    // Get Parent Name
    public function getSlug() {        
        return $this->slug;
    }

    // Get Id By Slug
    public  function getIdBySlug($slug = null) {
        if($slug !== null) {
            return  In::withoutGlobalScopes()->where('slug',$slug)->first()->id;
        }
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
