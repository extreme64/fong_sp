<?php

namespace App\Traits;

trait MediaPathTrait
{
    private function craftPath($mediaPath): string
    {
        return url('/') . '/' . $mediaPath;
    }
}