<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Currencies\ConvertCurrency;

class OutTour extends Model
{
    protected $guarded = ['id'];

    public $prices = ['price']; 

    public  $dir = "/uploads/images/tours/outgoing";

    // Default attributes
    protected $attributes = [
        'new' => true,
        'active' => true
    ];    

    // Attributes to be attached to child
    public $data = ['images','stars','new','active','price','map'];

    // Convert price
    public function convert() {
        $convert = new ConvertCurrency;
        $this->price = $convert($this->price);
        return $this->price;
    }

    // Relations
    public function outs() {
        return $this->belongsTo('App\Out','out_id');
    }
    
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

    // Get Parent
    public function getParentName($id) {
        return $this->outs()->where('id',$id)->orWhere('main_id',$id)->where('lang_id', session('lang'))->first()->name;
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

    // Global Scope to add in other places
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
