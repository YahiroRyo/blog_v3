<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Date;

final class CreatedAt extends Date {
    protected string $name = '作成日時';
}
