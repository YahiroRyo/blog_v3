<?php

namespace Packages\Domain\User\ValueObjects;

use Illuminate\Support\Facades\Validator;
use Packages\Domain\StructStringLengthLimit;

final class Email extends StructStringLengthLimit {
    protected int $lengthLimit = 256;
    protected string $name     = 'メールアドレス';

    public static function of($value): Email {
        Validator::make(
            ['メールアドレス' => $value],
            ['メールアドレス' => ['email']]
        )->validate();

        return parent::of($value);
    }
}
