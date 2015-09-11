<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Width1200 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}