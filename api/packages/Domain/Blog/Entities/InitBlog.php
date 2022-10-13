<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\MainImage;
use Packages\Domain\Blog\ValueObjects\Thumbnail;
use Packages\Domain\Blog\ValueObjects\Title;

final class InitBlog {
    private Title $title;
    private Body $body;
    private MainImage $mainImage;
    private Thumbnail $thumbnail;

    public function __construct(
        Title $title,
        Body $body,
        MainImage $mainImage,
        Thumbnail $thumbnail,
    ) {
        $this->title     = $title;
        $this->body      = $body;
        $this->mainImage = $mainImage;
        $this->thumbnail = $thumbnail;
    }

    public function title(): Title {
        return $this->title;
    }

    public function body(): Body {
        return $this->body;
    }

    public function mainImage(): MainImage {
        return $this->mainImage;
    }

    public function thumbnail(): Thumbnail {
        return $this->thumbnail;
    }
}
