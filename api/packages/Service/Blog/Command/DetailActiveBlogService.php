<?php

namespace Packages\Service\Blog\Command;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogRepository;

final class DetailActiveBlogService {
    private DetailActiveBlogRepository $detailActiveBlogRepository;

    public function __construct(
        DetailActiveBlogRepository $detailActiveBlogRepository,
    ) {
        $this->detailActiveBlogRepository = $detailActiveBlogRepository;
    }

    public function detailActiveBlog(BlogId $blogId): array {
        return $this->detailActiveBlogRepository->detailActiveBlog($blogId)->ofJson();
    }
}
