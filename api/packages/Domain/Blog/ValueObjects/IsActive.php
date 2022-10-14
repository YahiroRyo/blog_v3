<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Boolean;

final class IsActive extends Boolean {
    protected string $name = '公開・非公開';
}
