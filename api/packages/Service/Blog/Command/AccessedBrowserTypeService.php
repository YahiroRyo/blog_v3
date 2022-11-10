<?php

namespace Packages\Service\Blog\Command;

use Illuminate\Support\Facades\Cache;
use Packages\Domain\Blog\Entities\ForGetAccessedBrowserType;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Repositories\Blog\AccessedBrowserTypeRepository;

final class AccessedBrowserTypeService {
    private AccessedBrowserTypeRepository $accessedBrowserTypeRepository;

    public function __construct(AccessedBrowserTypeRepository $accessedBrowserTypeRepository) {
        $this->accessedBrowserTypeRepository = $accessedBrowserTypeRepository;
    }

    public function forgetCache(BlogId $blogId): void {
        Cache::forget($blogId->accessedBrowserTypeCacheKey());
    }

    public function get(ForGetAccessedBrowserType $forGetAccessedBrowserType): array {
        return Cache::remember(
            $forGetAccessedBrowserType->blogId()->accessedBrowserTypeCacheKey(),
            60 * 60 * 24,
            function () use ($forGetAccessedBrowserType) {
                return $this->accessedBrowserTypeRepository->get($forGetAccessedBrowserType)->ofJson();
            }
        );
    }
}
