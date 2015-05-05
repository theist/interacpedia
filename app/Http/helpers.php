<?php

function imagestyle($image, $style="small"){
    if(strstr($image,"images/"))
        return str_replace("images/","images/cache/".$style."/",$image);
    else
        return "/images/cache/".$style."/".$image;
}