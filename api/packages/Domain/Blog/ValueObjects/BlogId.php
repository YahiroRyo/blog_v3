<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Ulid;

final class BlogId extends Ulid {
    protected string $name = 'ブログID';
}
