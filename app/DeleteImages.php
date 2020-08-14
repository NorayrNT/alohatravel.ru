<?php 
namespace App;

class DeleteImages {
    
    public $model;
    
    /**
     * Delete images in a directory
     * 
     * @param $model
     * @return void
     */
    public function __invoke($model) {
        $check_class = get_class($model);
        if($check_class) {
            $dir = $model->dir;
            $files = scandir(public_path().$dir);
            $files = !empty($files)  ? array_slice($files,2) : $files;
            $images = $model->images;
            if(is_array($images) && !empty($images)) {             
                foreach($images as $image) {
                    if(!empty($files)) {
                        foreach($files as $name) {
                            if(strstr($image,$name)) {
                                unlink(public_path().$dir.'/'.$name);
                            }
                        }
                    }
                }
            }elseif(!is_null($images)) {
                $arr = explode("/",$images);
                $img = $arr[count($arr) - 1];
                if(!empty($files)) {
                    foreach($files as $name) {
                        if(strstr($img,$name)) {
                            unlink(public_path().$dir.'/'.$name);
                        }
                    }
                }
            }
        }
    }
}