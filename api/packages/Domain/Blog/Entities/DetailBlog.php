<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\IsActive;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class DetailBlog {
    private Title $title;
    private Body $body;
    private ThumbnailUrl $thumbnailUrl;
    private IsActive $isActive;

    public function __construct(
        Title $title,
        Body $body,
        ThumbnailUrl $thumbnailUrl,
        IsActive $isActive,
    ) {
        $this->title        = $title;
        $this->body         = $body;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->isActive     = $isActive;
    }

    public function title(): Title {
        return $this->title;
    }

    public function body(): Body {
        return $this->body;
    }

    public function thumbnailUrl(): ThumbnailUrl {
        return $this->thumbnailUrl;
    }

    public function isActive(): IsActive {
        return $this->isActive;
    }

    public function ofJson(): array {
        return [
            'title'        => $this->title->value(),
            'body'         => $this->body->value(),
            'thumbnail'    => $this->thumbnailUrl->value(),
            'mainImage'    => $this->thumbnailUrl->mainImage(),
            'isActive'     => $this->isActive->value(),
        ];
    }
}
