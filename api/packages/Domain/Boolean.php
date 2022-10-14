<?php

namespace Packages\Domain;

use Validator;

abstract class Boolean {
    protected bool $value;

    protected string $name;

    private function __construct($value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ['boolean']]
        )->validate();

        $this->value = $value;
    }

    public function value(): bool {
        return $this->value;
    }

    public static function of($value): Boolean {
        return new static($value);
    }
}
