<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\CreatedAt;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class ActiveBlog {
    private BlogId $blogId;
    private Title $title;
    private Body $body;
    private CreatedAt $createdAt;
    private ThumbnailUrl $thumbnailUrl;

    public function __construct(
        BlogId $blogId,
        Title $title,
        Body $body,
        CreatedAt $createdAt,
        ThumbnailUrl $thumbnailUrl,
    ) {
        $this->blogId        = $blogId;
        $this->title         = $title;
        $this->body          = $body;
        $this->createdAt     = $createdAt;
        $this->thumbnailUrl  = $thumbnailUrl;
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

    public function ofJson(): array {
        return [
            'blogId'        => $this->blogId->value(),
            'title'         => $this->title->value(),
            'body'          => $this->body->value(),
            'createdAt'     => $this->createdAt->date(),
            'thumbnail'     => $this->thumbnailUrl->value(),
        ];
    }
}
