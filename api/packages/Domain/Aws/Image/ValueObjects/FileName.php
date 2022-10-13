<?php

namespace Packages\Domain\Aws\Image\ValueObjects;

use Packages\Domain\StringLengthLimit;
use Rorecek\Ulid\Ulid;

final class FileName extends StringLengthLimit {
    protected int $lengthLimit = 255;
    protected string $name     = 'ファイル名前';

    public static function of($value): StringLengthLimit {
        if (empty($value)) {
            return parent::of((new Ulid())->generate().'.jpg');
        }
        parent::of($value);
    }
}
