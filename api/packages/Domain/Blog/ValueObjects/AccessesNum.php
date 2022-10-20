<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\PositiveNumber;

final class AccessesNum extends PositiveNumber {
    protected string $name = 'アクセスした回数';
    protected int $maxNumber = 1000000000;
}
