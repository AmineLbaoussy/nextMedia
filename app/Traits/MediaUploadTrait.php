<?php

namespace App\Traits;

trait MediaUploadTrait
{

     function saveImage($image,$path){
        $file_name = time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path($path), $file_name);
         return $file_name;
    }

}
