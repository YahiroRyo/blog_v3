<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Elements;

final class AccessList extends Elements {
    public function ofJson(): array {
        $result = [];

        foreach ($this->value as $access) {
            $result[] = $access->ofJson();
        }

        return $result;
    }
}
