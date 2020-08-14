<?php
namespace App\Currencies;

use App\Currency;
use App\Currencies\ConvertCurrency;

class Convert {
    public function __invoke($collect) {
        $convert_currency = new ConvertCurrency;
        if(is_countable($collect) && count($collect)) {            
            $class = get_class($collect[0]);
            $model = new $class;
            if(!empty($model->prices)) {
                foreach($model->prices as $price) {
                    foreach($collect as $k => $val) {
                        $collect[$k]->$price = $convert_currency($collect[$k]->$price);
                    }
                }
            }
            return $collect;
        }elseif($collect !== null) {
            $class = get_class($collect);
            $model = new $class;
            if(!empty($model->prices)) {
                foreach($model->prices as $price) {
                    $collect->$price = $convert_currency($collect->$price);
                }
            }
            return $collect;
        }
    }
}