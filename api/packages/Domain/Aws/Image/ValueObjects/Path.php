<?php

namespace Packages\Domain\Aws\Image\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class Path extends StructStringLengthLimit {
    protected int $lengthLimit = 255;
    protected string $name     = 'パス';
}
