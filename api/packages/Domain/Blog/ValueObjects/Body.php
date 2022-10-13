<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class Body extends StructStringLengthLimit {
    protected int $lengthLimit = 16384;
    protected string $name     = '内容';
}
