<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Elements;

final class AccessList extends Elements {
    /** @var Access[] */
    protected array $value;

    private function setAccess(int $index, Access $access): AccessList {
        $preValue         = $this->value;
        $preValue[$index] = $access;

        return AccessList::of($preValue);
    }

    public function increment(AccessDate $accessDate): AccessList {
        foreach ($this->value as $index => $access) {
            if ($access->accessDate() != $accessDate) {
                continue;
            }

            return $this->setAccess(
                $index,
                new Access(
                    $access->accessDate(),
                    AccessesNum::of($access->accessesNum()->value() + 1)
                )
            );
        }

        return $this->add(
            new Access(
                $accessDate,
                AccessesNum::of(1)
            )
        );
    }

    /**
     * @param Access $value
     */
    public function add($value): AccessList {
        return parent::add($value);
    }

    public function ofJson(): array {
        $result = [];

        foreach ($this->value as $access) {
            $result[] = $access->ofJson();
        }

        return $result;
    }

    public static function of($value = []): AccessList {
        return parent::of($value);
    }
}
