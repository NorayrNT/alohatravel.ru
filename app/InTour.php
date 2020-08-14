<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class InTour extends Model
{
    protected $guarded = ['id'];

    protected $attributes = [
        'active' => true,
        'top' => false
    ];

    public $data = ['images','map','stars','price','p6','p8','p10','p12','p16'];

    public $dir = "/uploads/images/tours/incoming";

    public $prices = ['price','p6','p8','p10','p12','p16'];
    
    // Relations
    public function ins() {
        return $this->belongsTo('App\In','in_id');
    }
    
    public function lang() {
        return $this->belongsTo("App\Locale",'lang_id');
    }

    public function inDays() {
        return $this->hasMany("App\InDay","in_tour_id");
    }

    public function tourStatuses() {
        return $this->belongsTo('App\TourStatus','status_id');
    }

    // Get Parent Name
    public function getName($id = null) {
        if(!is_null($id)) {
            $name = $this->ins()->where('id',$id)->first()->name;         
        }
    }
    
    // Get id or main id as a relation to ins
    public function getMainId() {
        return $this->main_id !== null ? $this->main_id : $this->id;
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
