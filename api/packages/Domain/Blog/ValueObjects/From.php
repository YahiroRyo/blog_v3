<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\NoSQLColumnString;
use Packages\Domain\StringLengthLimit;

final class From extends StringLengthLimit {
    use NoSQLColumnString;

    protected int $lengthLimit = 2000;
    protected string $name     = '送信元';
}
