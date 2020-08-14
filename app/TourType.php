<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TourType extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public $dir = "/uploads/images/tourtypes";

    // Parent attributes
    public $data = ['images','url'];

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
