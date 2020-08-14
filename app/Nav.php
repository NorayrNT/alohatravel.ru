<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Nav extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;


    // Relations
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
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
