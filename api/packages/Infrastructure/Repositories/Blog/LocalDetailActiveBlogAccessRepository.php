<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;

final class LocalDetailActiveBlogAccessRepository implements DetailActiveBlogAccessRepository {
    public function access(DetailActiveBlogAccess $detailActiveBlogAccess): void {
    }
}
