<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Domain\Blog\ValueObjects\AccessList;
use Packages\Infrastructure\Repositories\Blog\AccessesNumDetailBlogRepository;

final class LocalAccessesNumDetailBlogRepository implements AccessesNumDetailBlogRepository {
    public function get(AccessesNumDetailBlog $accessesNumDetailBlog): AccessList {
        return AccessList::of([]);
    }
}
