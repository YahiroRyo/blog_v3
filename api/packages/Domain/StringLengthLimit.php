<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;

abstract class StringLengthLimit {
    protected string $value;
    protected string $name;
    protected int $lengthLimit;

    private function __construct($value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ["max:{$this->lengthLimit}"]],
        )->validate();

        $this->value = $value ?? '';
    }

    public function value(): string {
        return $this->value;
    }

    public static function of($value): StringLengthLimit {
        return new static($value);
    }
}
