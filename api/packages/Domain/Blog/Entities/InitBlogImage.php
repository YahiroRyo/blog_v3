<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogImage;
use Packages\Domain\Blog\ValueObjects\BlogThumbnail;

final class InitBlogImage {
    private BlogImage $image;
    private BlogThumbnail $thumbnail;

    public function __construct(
        BlogImage $image,
        BlogThumbnail $thumbnail,
    ) {
        $this->image     = $image;
        $this->thumbnail = $thumbnail;
    }

    public function image(): BlogImage {
        return $this->image;
    }

    public function thumbnail(): BlogThumbnail {
        return $this->thumbnail;
    }
}
