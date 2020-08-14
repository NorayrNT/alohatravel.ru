<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class About extends Model
{
    protected $guarded = ['id'];

    protected $table = 'about';

    protected $attributes = [
        'lang_id' => '1'
    ];

    public $timestamps = false;

    // Relations
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

    //Set Images
    public function setImagesAttribute($images) {
        if(is_array($images)) {
            return $this->attributes['images'] = json_encode($images);
        }
    }

    //Get Images
    public function getImagesAttribute($images ) {
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
