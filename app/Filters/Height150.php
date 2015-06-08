<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Height150 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(null, 150, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}