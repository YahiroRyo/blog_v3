<?php

namespace Packages\Domain\Blog\Entities;

use Packages\Domain\Blog\ValueObjects\Browser;

final class AccessedBrowserType {
    /** @var array<string, int> */
    protected array $value = [];

    public function __construct(array $value) {
        $this->value = $value;
    }

    public function addBrowser(Browser $browser): AccessedBrowserType {
        $preValue                  = $this->value;
        $preValue[$browser->value] = 1;

        return AccessedBrowserType::of($preValue);
    }

    private function incrementBrowser(Browser $browser): AccessedBrowserType {
        $preValue = $this->value;
        $preValue[$browser->value]++;

        return AccessedBrowserType::of($preValue);
    }

    public function increment(Browser $browser): AccessedBrowserType {
        foreach ($this->value as $targetBrowser => $num) {
            if (!$browser->eq($targetBrowser)) {
                continue;
            }

            return $this->incrementBrowser($browser);
        }

        return $this->addBrowser($browser);
    }

    public function ofJson(): array {
        $result = [];

        foreach ($this->value as $browser => $accessNum) {
            $result[] = [
                'name'  => $browser,
                'value' => $accessNum,
            ];
        }

        return $result;
    }

    public static function of($value = []): AccessedBrowserType {
        return new static($value);
    }
}
