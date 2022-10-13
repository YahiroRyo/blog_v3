<?php

namespace Packages\Domain\User\ValueObjects;

use Packages\Domain\StructStringLengthLimit;

final class Password extends StructStringLengthLimit {
    protected int $lengthLimit = 256;
    protected string $name     = 'パスワード';

    public function hashValue(): string {
        return bcrypt($this->value());
    }
}
