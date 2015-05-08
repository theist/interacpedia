<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Fit100x100 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(100, 100, function ($constraint) {
            //$constraint->upsize();
        });
    }
}