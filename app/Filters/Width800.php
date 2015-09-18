<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Width800 implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}