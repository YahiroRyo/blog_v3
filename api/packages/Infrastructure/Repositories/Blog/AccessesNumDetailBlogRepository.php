<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Domain\Blog\ValueObjects\AccessList;

interface AccessesNumDetailBlogRepository {
    public function get(AccessesNumDetailBlog $accessesNumDetailBlog): AccessList;
}
