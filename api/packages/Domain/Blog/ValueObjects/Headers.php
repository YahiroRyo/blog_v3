<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\StringLengthLimit;

final class Headers extends StringLengthLimit {
    protected int $lengthLimit = 16384;
    protected string $name     = 'ヘッダー';
}
