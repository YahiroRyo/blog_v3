<?php

namespace Packages\Domain;

abstract class Elements {
    protected array $value;

    protected function __construct($value) {
        $this->value = $value;
    }

    public function add($value): Elements {
        return new static(array_merge($this->value, [$value]));
    }

    public function value(): array {
        return $this->value;
    }

    public static function of($value = []): Elements {
        return new static($value);
    }
}
