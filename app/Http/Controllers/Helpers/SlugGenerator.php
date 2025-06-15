<?php

namespace App\Http\Controllers\Helpers;


trait SlugGenerator {


    public function generateslug($name, $model){
          
        $count = $model::where('slug','LIKE', '%'.str($name)->slug() . '%')->count();

        if($count >0){
            $count++;
           return $slug = str($name)->slug() . '-' . $count;
        }else{
           return $slug = str($name)->slug();
        }
 
    }
}