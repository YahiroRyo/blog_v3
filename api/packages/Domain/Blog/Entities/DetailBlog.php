<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\IsActive;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;
use Packages\Domain\Blog\ValueObjects\AccessList;

final class DetailBlog {
    private BlogId $blogId;
    private Title $title;
    private Body $body;
    private ThumbnailUrl $thumbnailUrl;
    private IsActive $isActive;
    private AccessList $accessList;

    public function __construct(
        BlogId $blogId,
        Title $title,
        Body $body,
        ThumbnailUrl $thumbnailUrl,
        IsActive $isActive,
        AccessList $accessList,
    ) {
        $this->blogId        = $blogId;
        $this->title         = $title;
        $this->body          = $body;
        $this->thumbnailUrl  = $thumbnailUrl;
        $this->isActive      = $isActive;
        $this->accessList   = $accessList;
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

    public function isActive(): IsActive {
        return $this->isActive;
    }

    public function accessList(): AccessList {
        return $this->accessList;
    }

    public function ofJson(): array {
        return [
            'blogId'        => $this->blogId->value(),
            'title'         => $this->title->value(),
            'body'          => $this->body->value(),
            'thumbnail'     => $this->thumbnailUrl->value(),
            'mainImage'     => $this->thumbnailUrl->mainImage(),
            'isActive'      => $this->isActive->value(),
            'accessList'   => $this->accessList->ofJson(),
        ];
    }
}
