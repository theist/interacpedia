<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Height120 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(null, 120, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}