<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\CreatedAt;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class DetailActiveBlog {
    private Title $title;
    private Body $body;
    private CreatedAt $createdAt;
    private ThumbnailUrl $thumbnailUrl;

    public function __construct(
        Title $title,
        Body $body,
        CreatedAt $createdAt,
        ThumbnailUrl $thumbnailUrl,
    ) {
        $this->title        = $title;
        $this->body         = $body;
        $this->createdAt    = $createdAt;
        $this->thumbnailUrl = $thumbnailUrl;
    }

    public function title(): Title {
        return $this->title;
    }

    public function body(): Body {
        return $this->body;
    }

    public function createdAt(): CreatedAt {
        return $this->createdAt;
    }

    public function thumbnailUrl(): ThumbnailUrl {
        return $this->thumbnailUrl;
    }


    public function ofJson(): array {
        return [
            'title'        => $this->title->value(),
            'body'         => $this->body->value(),
            'thumbnail'    => $this->thumbnailUrl->value(),
            'mainImage'    => $this->thumbnailUrl->mainImage(),
            'createdAt'    => $this->createdAt->date(),
        ];
    }
}
