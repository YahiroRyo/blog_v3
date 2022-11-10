<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\CreatedAt;
use Packages\Domain\Blog\ValueObjects\IsActive;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class Blog {
    private BlogId $blogId;
    private Title $title;
    private Body $body;
    private ThumbnailUrl $thumbnailUrl;
    private CreatedAt $createdAt;
    private IsActive $isActive;

    public function __construct(
        BlogId $blogId,
        Title $title,
        Body $body,
        ThumbnailUrl $thumbnailUrl,
        CreatedAt $createdAt,
        IsActive $isActive,
    ) {
        $this->blogId        = $blogId;
        $this->title         = $title;
        $this->body          = $body;
        $this->thumbnailUrl  = $thumbnailUrl;
        $this->createdAt     = $createdAt;
        $this->isActive      = $isActive;
    }

    public function blogId(): BlogId {
        return $this->blogId;
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

    public function createdAt(): CreatedAt {
        return $this->createdAt;
    }

    public function isActive(): IsActive {
        return $this->isActive;
    }

    public function ofJson(): array {
        return [
            'blogId'        => $this->blogId->value(),
            'title'         => $this->title->value(),
            'body'          => $this->body->value(),
            'thumbnail'     => $this->thumbnailUrl->value(),
            'createdAt'     => $this->createdAt->date(),
            'isActive'      => $this->isActive->value(),
        ];
    }
}
