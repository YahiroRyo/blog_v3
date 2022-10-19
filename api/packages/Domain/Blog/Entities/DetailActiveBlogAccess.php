<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\From;
use Packages\Domain\Blog\ValueObjects\Headers;
use Packages\Domain\Blog\ValueObjects\Referer;
use Packages\Domain\Blog\ValueObjects\UserAgent;

final class DetailActiveBlogAccess {
    private BlogId $blogId;
    private Headers $headers;
    private UserAgent $userAgent;
    private Referer $referer;
    private From $from;

    public function __construct(
        BlogId $blogId,
        Headers $headers,
        UserAgent $userAgent,
        Referer $referer,
        From $from,
    ) {
        $this->blogId    = $blogId;
        $this->headers   = $headers;
        $this->userAgent = $userAgent;
        $this->referer   = $referer;
        $this->from      = $from;
    }

    public function blogId(): BlogId {
        return $this->blogId;
    }

    public function headers(): Headers {
        return $this->headers;
    }

    public function userAgent(): UserAgent {
        return $this->userAgent;
    }

    public function referer(): Referer {
        return $this->referer;
    }

    public function from(): From {
        return $this->from;
    }
}
