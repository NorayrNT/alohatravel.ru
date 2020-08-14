<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\CarPrice;

class Car extends Model
{
   protected $guarded = ['id'];

   public $data = ['name','type','trans','doors','seats','boots','motor','images','d2','d4','d7','d12','d30'];

   public $dir = "/uploads/images/services/cars";

   public $prices = ['d2','d4','d7','d12','d30'];

   // Relations 
    public function carPrices() {
        return $this->hasOne("App\CarPrice","car_id");
    }
    
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

    //Set images to json
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
