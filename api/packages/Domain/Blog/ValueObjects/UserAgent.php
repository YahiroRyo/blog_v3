<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\NoSQLColumnString;
use Packages\Domain\StringLengthLimit;

final class UserAgent extends StringLengthLimit {
    use NoSQLColumnString;

    protected int $lengthLimit = 2000;
    protected string $name     = 'ユーザー情報';
}
