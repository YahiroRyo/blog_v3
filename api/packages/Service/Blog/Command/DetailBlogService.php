<?php

namespace Packages\Service\Blog\Command;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Repositories\Blog\DetailBlogRepository;

final class DetailBlogService {
    private DetailBlogRepository $detailBlogRepository;

    public function __construct(
        DetailBlogRepository $detailBlogRepository,
    ) {
        $this->detailBlogRepository = $detailBlogRepository;
    }

    public function blog(BlogId $blogId): array {
        return $this->detailBlogRepository->blog($blogId)->ofJson();
    }
}
