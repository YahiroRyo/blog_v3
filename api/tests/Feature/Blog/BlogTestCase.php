<?php

namespace Tests\Feature\Blog;

use Packages\Infrastructure\Repositories\Blog\BlogRepository;
use Packages\Infrastructure\Repositories\Blog\DetailBlogRepository;
use Packages\Service\Blog\Command\BlogService;
use Packages\Service\Blog\Command\DetailBlogService;
use Tests\DBSetUpTestCase;

class BlogTestCase extends DBSetUpTestCase {
    protected BlogService $blogService;
    protected DetailBlogService $detailBlogService;

    public function setUp(): void {
        parent::setUp();

        $this->blogService       = new BlogService(new BlogRepository());
        $this->detailBlogService = new DetailBlogService(new DetailBlogRepository());
    }
}
