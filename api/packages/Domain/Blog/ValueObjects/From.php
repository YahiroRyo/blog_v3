<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class From extends StructStringLengthLimit {
    protected int $lengthLimit = 2000;
    protected string $name     = '送信元';
}
