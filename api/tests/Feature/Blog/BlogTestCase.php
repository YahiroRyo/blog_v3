<?php

namespace Tests\Feature\Blog;

use Packages\Infrastructure\Repositories\Blog\ActiveBlogRepository;
use Packages\Infrastructure\Repositories\Blog\BlogRepository;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogRepository;
use Packages\Infrastructure\Repositories\Blog\LocalDetailActiveBlogAccessRepository;
use Packages\Infrastructure\Repositories\Blog\DetailBlogRepository;
use Packages\Service\Blog\Command\ActiveBlogService;
use Packages\Service\Blog\Command\BlogService;
use Packages\Service\Blog\Command\DetailActiveBlogService;
use Packages\Service\Blog\Command\DetailBlogService;
use Tests\DBSetUpTestCase;

class BlogTestCase extends DBSetUpTestCase {
    protected BlogService $blogService;
    protected DetailBlogService $detailBlogService;
    protected ActiveBlogService $activeBlogService;
    protected DetailActiveBlogService $detailActiveBlogService;

    public function setUp(): void {
        parent::setUp();

        $this->blogService             = new BlogService(new BlogRepository());
        $this->detailBlogService       = new DetailBlogService(new DetailBlogRepository());
        $this->activeBlogService       = new ActiveBlogService(new ActiveBlogRepository());
        $this->detailActiveBlogService = new DetailActiveBlogService(
            new DetailActiveBlogRepository(),
            new LocalDetailActiveBlogAccessRepository()
        );
    }
}
