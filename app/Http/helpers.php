<?php

use Intervention\Image\Facades\Image;

function imagestyle($image, $style="small"){
    if(strstr($image,"http")){
        $user = \Illuminate\Support\Facades\Auth::user();
        $file = '/images/users/'.$user->id.'.jpg';
        $img = Image::make($image)->encode('jpg')->save( public_path(). $file );
        $user->avatar = $file;
        $user->save();
        $image = $file;
    }

    if(file_exists(public_path()."/".$image) && $image !=""){
        if(strstr($image,"images/")){
            return str_replace("images/","images/cache/".$style."/",$image);
        } else{
            return "/images/cache/".$style."/".$image;
        }
    } else {
        return "/images/cache/".$style."/users/generic.png";
    }
}