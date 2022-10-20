<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\End;
use Packages\Domain\Blog\ValueObjects\Start;

final class AccessesNumDetailBlog {
    private BlogId $blogId;
    private Start $start;
    private End $end;

    public function __construct(
        BlogId $blogId,
        Start $start,
        End $end,
    ) {
        $this->blogId = $blogId;
        $this->start  = $start;
        $this->end    = $end;
    }

    public function blogId(): BlogId {
        return $this->blogId;
    }

    public function start(): Start {
        return $this->start;
    }

    public function end(): End {
        return $this->end;
    }
}
