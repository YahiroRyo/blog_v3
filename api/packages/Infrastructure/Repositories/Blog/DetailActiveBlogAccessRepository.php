<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;

interface DetailActiveBlogAccessRepository {
    public function access(DetailActiveBlogAccess $detailActiveBlogAccess): void;
}
