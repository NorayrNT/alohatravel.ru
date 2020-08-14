<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Out extends Model
{
    protected $guarded = ['id'];

    protected $attributes = [
        'lang_id' => '1',
    ];

    public $timestamps  = false;

    // Relations
    public function OutTours() {
        return $this->hasMany('App\OutTour','out_id');
    }
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
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
