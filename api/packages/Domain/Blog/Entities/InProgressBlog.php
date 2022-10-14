<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\IsActive;
use Packages\Domain\Blog\ValueObjects\Title;

final class InProgressBlog {
    private BlogId $blogId;
    private Title $title;
    private Body $body;
    private IsActive $isActive;

    public function __construct(
        BlogId $blogId,
        Title $title,
        Body $body,
        IsActive $isActive
    ) {
        $this->blogId     = $blogId;
        $this->title      = $title;
        $this->body       = $body;
        $this->isActive   = $isActive;
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

    public function isActive(): IsActive {
        return $this->isActive;
    }
}
