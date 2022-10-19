<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\StringLengthLimit;

final class Referer extends StringLengthLimit {
    protected int $lengthLimit = 2000;
    protected string $name     = 'リファラ';
}
