<?php

namespace Packages\Domain\Aws\Image\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class TmpImageFilePath extends StructStringLengthLimit {
    protected int $lengthLimit = 255;
    protected string $name     = '一時的なイメージファイルのパス';
}
