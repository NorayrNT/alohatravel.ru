<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingType extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];


    // Relations
    public function shippings() {
        return $this->hasMany("App\Shipping","shipping_type");
    }

}
