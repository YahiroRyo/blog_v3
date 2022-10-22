<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Image;

final class BlogThumbnail extends Image {
    protected int $width   = 800;
    protected int $height  = 450;
    protected int $maxSize = 5120;
    protected int $quality = 20;
    protected string $name = 'サムネイル';
}
