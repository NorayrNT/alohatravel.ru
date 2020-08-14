<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Extreme extends Model
{    
    protected $guarded = ['id'];

    protected $attributes = [
        'active' => true,
    ];

    public $data = ['images','price','active'];

    public $prices = ['price'];

    public $dir = "/uploads/images/tours/extreme";

    // Relations
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
