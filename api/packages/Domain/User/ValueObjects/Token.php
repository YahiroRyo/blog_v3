<?php

namespace Packages\Domain\User\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class Token extends StructStringLengthLimit {
    protected int $lengthLimit = 256;
    protected string $name     = 'トークン';
}
