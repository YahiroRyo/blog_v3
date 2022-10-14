<?php

namespace Packages\Service\Blog\Command;

use Packages\Infrastructure\Repositories\Blog\BlogRepository;

final class BlogService {
    private BlogRepository $blogRepository;

    public function __construct(
        BlogRepository $blogRepository,
    ) {
        $this->blogRepository = $blogRepository;
    }

    public function blogList(): array {
        return $this->blogRepository->blogList()->ofJson();
    }
}
