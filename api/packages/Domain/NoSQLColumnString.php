<?php

namespace Packages\Domain;

trait NoSQLColumnString {
    public function value(): string {
        return parent::value() === '' ? 'None' : parent::value();
    }
}
