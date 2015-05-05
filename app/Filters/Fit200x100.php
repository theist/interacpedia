<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Fit200x100 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(180, 80, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        })->resizeCanvas(200,100);
    }
}