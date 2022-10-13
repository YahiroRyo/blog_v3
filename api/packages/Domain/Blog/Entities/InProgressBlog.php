<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\Title;

final class InProgressBlog {
    private BlogId $blogId;
    private Title $title;
    private Body $body;

    public function __construct(
        BlogId $blogId,
        Title $title,
        Body $body,
    ) {
        $this->blogId     = $blogId;
        $this->title      = $title;
        $this->body       = $body;
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
}
