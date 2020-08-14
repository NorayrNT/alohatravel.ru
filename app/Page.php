<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Page extends Model
{
    protected  $guarded = ['id'];

    public $timestamps = false;

    // Default attributes
    protected $attributes = [
        'ads' => false,
    ];
    
    // Parent attributes to  attach to children
    public $data = ['title','ads'];

    // Relations
    public function langs() {
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
