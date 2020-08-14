<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    // Check Currency
    public function checkCurrency() {
        return $this->id == session('currency') ? true : false;
    }

    // Accessors and mutators
    public function getSymbolAttribute($symbol) {
        return html_entity_decode($symbol, ENT_QUOTES, 'UTF-8');
    }
    
}
