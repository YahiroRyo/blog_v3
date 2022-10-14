<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class ActiveBlog {
    private Title $title;
    private Body $body;
    private ThumbnailUrl $thumbnailUrl;

    public function __construct(
        Title $title,
        Body $body,
        ThumbnailUrl $thumbnailUrl,
    ) {
        $this->title        = $title;
        $this->body         = $body;
        $this->thumbnailUrl = $thumbnailUrl;
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

    public function ofJson(): array {
        return [
            'title'        => $this->title->value(),
            'body'         => $this->body->value(),
            'thumbnailUrl' => $this->thumbnailUrl->value(),
        ];
    }
}
