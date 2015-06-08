<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Scale200x200 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(200,200);
    }
}