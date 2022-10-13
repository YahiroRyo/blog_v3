<?php

namespace Packages\Domain;

abstract class Identifer {
    protected int $value;

    protected string $name;

    private function __construct(int $value) {
        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }

    public static function of(int $value): Identifer {
        return new static($value);
    }
}
