<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Fit330x297 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(330, 297, function ($constraint) {
            $constraint->upsize();
        })->resizeCanvas(330,297);
    }
}