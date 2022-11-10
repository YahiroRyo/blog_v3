<?php

namespace Packages\Service\Blog\Command;

use Illuminate\Support\Facades\Cache;
use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Repositories\Blog\AccessesNumDetailBlogRepository;

final class AccessesNumDetailBlogService {
    private AccessesNumDetailBlogRepository $accessesNumDetailBlogs;

    public function __construct(AccessesNumDetailBlogRepository $accessesNumDetailBlogs) {
        $this->accessesNumDetailBlogs = $accessesNumDetailBlogs;
    }

    public function forgetCache(BlogId $blogId): void {
        Cache::forget($blogId->cacheKey());
    }

    public function get(AccessesNumDetailBlog $accessesNumDetailBlog): array {
        return Cache::remember(
            $accessesNumDetailBlog->blogId()->cacheKey(),
            60 * 60 * 24,
            function () use ($accessesNumDetailBlog) {
                return $this->accessesNumDetailBlogs->get($accessesNumDetailBlog)->ofJson();
            }
        );
    }
}
