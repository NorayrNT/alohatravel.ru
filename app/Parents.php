<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents {

    public function __invoke($collect) {
        if(is_countable($collect)) {
            foreach($collect as $k => $val) {
                ($collect)[$k] = $val->getParent($val->id);
            }
        }elseif(!is_null($collect)) {
            $class = get_class($collect);
            $model = new $class;
            if(!is_null($collect->main_id)) {
                $parent = $model->withoutGlobalScopes()->find($collect->main_id);
                if(!empty($model->data)) {
                    foreach($model->data as $item) {
                        $collect[$item] = $parent[$item];
                    }
                }
            }
        }
        return $collect;      
    }    
}