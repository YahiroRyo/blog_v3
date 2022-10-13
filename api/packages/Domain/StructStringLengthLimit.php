<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;

abstract class StructStringLengthLimit {
    protected string $value;

    protected string $name;
    protected int $lengthLimit;

    private function __construct($value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ["required", "max:{$this->lengthLimit}"]],
            [
                'required'  => ':attributeは必須項目です',
                'max'       => ':attributeは:max文字以下である必要があります',
            ]
        )->validate();

        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }

    public static function of($value): StructStringLengthLimit {
        return new static($value);
    }
}
