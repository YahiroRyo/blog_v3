<?php

namespace Packages\Service\Blog\Command;

use Packages\Infrastructure\Repositories\Blog\ActiveBlogRepository;

final class ActiveBlogService {
    private ActiveBlogRepository $activeBlogRepository;

    public function __construct(
        ActiveBlogRepository $activeBlogRepository,
    ) {
        $this->activeBlogRepository = $activeBlogRepository;
    }

    public function activeBlogList(): array {
        return $this->activeBlogRepository->activeBlogList()->ofJson();
    }
}
