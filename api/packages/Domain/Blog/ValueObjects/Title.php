<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class Title extends StructStringLengthLimit {
    protected int $lengthLimit = 100;
    protected string $name     = 'タイトル';
}
