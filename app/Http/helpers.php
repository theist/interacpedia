<?php

use Intervention\Image\Facades\Image;

/**
 * @param $image
 * @param string $style
 * @return mixed|string
 */
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
        if(strstr($image,"images/"))
        {
            return str_replace( "images/", "images/cache/" . $style . "/", $image );
        } else if(strstr($image,"media/")){

            $path = public_path(). "/images".str_replace(".","",str_replace(" ","_",$image)).".jpg";
            if(!file_exists(substr($path,0,strrpos($path,'/'))))
                File::makeDirectory(substr($path,0,strrpos($path,'/')), $mode = 0777, true);
            Image::make(public_path().$image)->encode('jpg')->save( $path );
            return "/images/cache/".$style.str_replace(".","",str_replace(" ","_",$image)).".jpg";
        } else{
            return "/images/cache/".$style."/".$image;
        }
    } else {
        return "/images/cache/".$style."/users/generic.png";
    }
}