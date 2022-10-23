<?php

namespace Packages\Service\Blog\Command;

use Illuminate\Support\Facades\Cookie;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogRepository;

final class DetailActiveBlogService {
    private DetailActiveBlogRepository $detailActiveBlogRepository;
    private DetailActiveBlogAccessRepository $detailActiveBlogAccessRepository;

    public function __construct(
        DetailActiveBlogRepository $detailActiveBlogRepository,
        DetailActiveBlogAccessRepository $detailActiveBlogAccessRepository
    ) {
        $this->detailActiveBlogRepository       = $detailActiveBlogRepository;
        $this->detailActiveBlogAccessRepository = $detailActiveBlogAccessRepository;
    }

    public function detailActiveBlog(BlogId $blogId): array {
        return $this->detailActiveBlogRepository->detailActiveBlog($blogId)->ofJson();
    }

    public function detialActiveBlogAccess(DetailActiveBlogAccess $detailActiveBlogAccess): void {
        if (Cookie::get("accessed/blogs/{$detailActiveBlogAccess->blogId()->value()}")) {
            return;
        }

        $this->detailActiveBlogAccessRepository->access($detailActiveBlogAccess);
    }
}
