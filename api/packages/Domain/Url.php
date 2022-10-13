<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;

abstract class Url {
    protected string $value;

    protected string $name;

    private function __construct($value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ["url"]],
            [
                'url'       => ':attributeはURLである必要があります',
            ]
        )->validate();

        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }

    public static function of($value): Url {
        return new static($value);
    }
}
