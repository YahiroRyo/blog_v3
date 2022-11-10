<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Packages\Domain\Blog\Entities\AccessedBrowserType;
use Packages\Domain\Blog\Entities\ForGetAccessedBrowserType;

interface AccessedBrowserTypeRepository {
    public function get(ForGetAccessedBrowserType $forGetAccessedBrowserType): AccessedBrowserType;
}
