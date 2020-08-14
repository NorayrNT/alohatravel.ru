<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPrice extends Model
{
    protected $guarded = ['id'];

    public function cars(){
        return $this->belongsTo('App\Car','car_id');
    }

}
