<?php

namespace Packages\Service\Blog\Command;

use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Infrastructure\Repositories\Blog\AccessesNumDetailBlogRepository;

final class AccessesNumDetailBlogService {
    private AccessesNumDetailBlogRepository $accessesNumDetailBlogs;

    public function __construct(AccessesNumDetailBlogRepository $accessesNumDetailBlogs) {
        $this->accessesNumDetailBlogs = $accessesNumDetailBlogs;
    }

    public function get(AccessesNumDetailBlog $accessesNumDetailBlog): array {
        return $this->accessesNumDetailBlogs->get($accessesNumDetailBlog)->ofJson();
    }
}
