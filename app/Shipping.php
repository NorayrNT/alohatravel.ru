<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Shipping extends Model
{
    protected $guarded = ['id'];

    public $data = ['price','luggage','duration','distance','date','shipping_type'];

    // Relations
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

    public function shippingTypes() {
        return $this->belongsTo("App\ShippingType",'shipping_type');
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
