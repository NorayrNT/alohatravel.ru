<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class WhyWe extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
    
    // Relations
    public function lang() {
        return $this->belongsTo("App\Lolcale","lang_id");
    }

    // Get div to be rendered
    public function renderDiv($index) {
        switch($index) {
            case '1':
                return "<div class='we_circle' style='background:#007dc4'></div>";
                break;
            case '2':
                return "<div class='we_circle' style='background:#28baf9'></div>";
                break;
            case '3':
                return "<div class='we_circle' style='background:#83d7fc'></div>";
                break;
            default: true; 
        }
    }

    // Global Scope
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
