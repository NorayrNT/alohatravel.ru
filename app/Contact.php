<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public $data = ['map','email'];

    
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

    // Accessors and mutators
    public function getPhone() {
        $arr = '';
        if(!is_null($this->phone)) {
            $arr = explode(",",$this->phone);
        }
        return $arr;
    }
    
}
