<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\MainImage;
use Packages\Domain\Blog\ValueObjects\Thumbnail;

final class InProgressBlogMainImage {
    private BlogId $blogId;
    private Thumbnail $thumbnail;
    private MainImage $mainImage;

    public function __construct(
        BlogId $blogId,
        Thumbnail $thumbnail,
        MainImage $mainImage,
    ) {
        $this->blogId    = $blogId;
        $this->mainImage = $mainImage;
        $this->thumbnail = $thumbnail;
    }

    public function blogId(): BlogId {
        return $this->blogId;
    }

    public function thumbnail(): Thumbnail {
        return $this->thumbnail;
    }

    public function mainImage(): MainImage {
        return $this->mainImage;
    }
}
