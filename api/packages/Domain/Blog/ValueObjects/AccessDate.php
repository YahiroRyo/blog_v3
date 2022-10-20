<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Date;

final class AccessDate extends Date {
    protected string $name = 'アクセスした日付';
}
