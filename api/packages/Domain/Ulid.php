<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;

abstract class Ulid {
    protected string $value;

    protected string $name;

    private function __construct($value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ["min:26", "max:26"]],
            [
                'min' => ':attributeはUlidである必要があります',
                'nax' => ':attributeはUlidである必要があります',
            ]
        )->validate();

        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }

    public static function of($value): Ulid {
        return new static($value);
    }
}
