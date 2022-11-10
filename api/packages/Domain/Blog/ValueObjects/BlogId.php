<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\NoSQLColumnString;
use Packages\Domain\Ulid;

final class BlogId extends Ulid {
    use NoSQLColumnString;

    protected string $name = 'ブログID';

    public function accessesNumCacheKey(): string {
        return "blogs/accessesNum/{$this->value}";
    }

    public function accessedBrowserTypeCacheKey(): string {
        return "blogs/accessedBrowserType/{$this->value}";
    }
}
