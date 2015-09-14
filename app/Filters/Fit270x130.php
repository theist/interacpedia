<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Fit270x130 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(270, 130, function ($constraint) {
            $constraint->upsize();
        })->resizeCanvas(270,130);
    }
}