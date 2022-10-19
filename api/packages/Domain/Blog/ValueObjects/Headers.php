<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\NoSQLColumnString;
use Packages\Domain\StringLengthLimit;

final class Headers extends StringLengthLimit {
    use NoSQLColumnString;

    protected int $lengthLimit = 16384;
    protected string $name     = 'ヘッダー';
}
