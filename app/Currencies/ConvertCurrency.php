<?php
namespace App\Currencies;

use App\Currency;

class ConvertCurrency {
    
    /**
     * Get the current  currency rate
     * 
     * @param null
     * 
     * @return $amount 
     */

    public function __invoke($amount) {
        $currencies = new \App\Currency;
        $currency_id = session('currency');
        $currency  = $currencies::find(session('currency'));
        $rate = '';
        if($currency_id === '1') {
            return $amount;
        }else {
            switch($currency->title) {
                case 'rub':
                    $rate = $currency->rate;
                    $amount = $amount * $rate; 
                    break;
                case 'amd':
                    $rate = $currencies->where('title','amd')->first()->rate;
                    $amount = $amount * $rate;
                    break;
                default:
                    return $amount;
            }
        }
        return $amount;
    }

}