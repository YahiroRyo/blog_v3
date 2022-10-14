<?php

namespace Packages\Service\Blog\Query;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Repositories\Blog\DeleteBlogRepository;

final class DeleteBlogService {
    private DeleteBlogRepository $deleteBlogRepository;

    public function __construct(
        DeleteBlogRepository $deleteBlogRepository,
    ) {
        $this->deleteBlogRepository = $deleteBlogRepository;
    }

    public function deleteBlog(BlogId $blogId): void {
        $this->deleteBlogRepository->deleteBlog($blogId);
    }
}
