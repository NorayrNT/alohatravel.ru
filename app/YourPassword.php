<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YourPassword extends Model
{
    protected $guarded = ['id'];

    public $fillable = ['user_id','password'];

    public function users() {
        return $this->belongsTo('App\User','user_id');
    }
}
