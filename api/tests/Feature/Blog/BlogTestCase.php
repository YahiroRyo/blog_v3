<?php

namespace Tests\Feature\Blog;

use Packages\Infrastructure\Repositories\Blog\BlogRepository;
use Packages\Service\Blog\Command\BlogService;
use Tests\DBSetUpTestCase;

class BlogTestCase extends DBSetUpTestCase {
    protected BlogService $blogService;

    public function setUp(): void {
        parent::setUp();

        $this->blogService = new BlogService(new BlogRepository());
    }
}
