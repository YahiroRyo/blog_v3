<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Date;

final class End extends Date {
    protected string $name = '検索終了日時';
}
