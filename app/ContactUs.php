<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $guarded = ['id'];

    
    // Relations
    public function users() {
        return $this->belongsTo('App\User','user_id');
    }
    
}
