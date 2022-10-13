<?php

namespace Packages\Domain\Aws\Image\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class Path extends StructStringLengthLimit {
    protected int $lengthLimit = 255;
    protected string $name     = 'パス';

    public static function of($value): StructStringLengthLimit {
        $structStringLengthLimit = parent::of($value);
        return parent::of(rtrim($structStringLengthLimit->value(), '/'));
    }
}
