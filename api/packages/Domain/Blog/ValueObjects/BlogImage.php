<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Image;

final class BlogImage extends Image {
    protected int $width   = 1920;
    protected int $height  = 1080;
    protected int $maxSize = 5120;
    protected int $quality = 90;
    protected string $name = '画像';
}
