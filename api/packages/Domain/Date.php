<?php

namespace Packages\Domain;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

abstract class Date {
    protected Carbon $value;

    protected string $name;

    private function __construct(string $value) {
        Validator::make([$this->name => $value], [$this->name, 'date'])->validate();

        $this->value = new Carbon($value);
    }

    public function value(): Carbon {
        return $this->value;
    }

    public static function of(string $value): Date {
        return new static($value);
    }
}
