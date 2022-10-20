<?php

namespace Packages\Domain\Blog\ValueObjects;

final class Access {
    private AccessDate $accessDate;
    private AccessesNum $accessesNum;

    public function __construct(
        AccessDate $accessDate,
        AccessesNum $accessesNum,
    ) {
        $this->accessDate  = $accessDate;
        $this->accessesNum = $accessesNum;
    }

    public function accessDate(): AccessDate {
        return $this->accessDate;
    }

    public function accessesNum(): AccessesNum {
        return $this->accessesNum;
    }

    public function ofJson(): array {
        return [$this->accessDate->value()->toDate() => $this->accessesNum->value()];
    }
}
