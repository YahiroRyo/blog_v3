<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;

abstract class PositiveNumber {
    protected int $value;

    protected int $name;
    protected int $maxNumber;

    private function __construct(int $value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ["min:0", "max:{$this->maxNumber}"]],
            [
                'min'       => ':attributeは:min以上である必要があります',
                'max'       => ':attributeは:max以下である必要があります',
            ]
        )->validate();

        $this->value = $value;
    }

    public function value(): int {
        return $this->value;
    }

    public static function of(int $value): PositiveNumber {
        return new static($value);
    }
}
