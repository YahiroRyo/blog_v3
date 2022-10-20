<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Date;

final class Start extends Date {
    protected string $name = '検索開始日時';
}
