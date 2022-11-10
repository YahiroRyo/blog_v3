<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Packages\Domain\Blog\Entities\AccessedBrowserType;
use Packages\Domain\Blog\Entities\ForGetAccessedBrowserType;
use Packages\Domain\Blog\ValueObjects\Browser;

final class LocalAccessedBrowserTypeRepository implements AccessedBrowserTypeRepository {
    public function get(ForGetAccessedBrowserType $forGetAccessedBrowserType): AccessedBrowserType {
        $result = AccessedBrowserType::of([]);

        foreach (Browser::cases() as $browser) {
            for ($i = 0; $i < random_int(1, 1000); $i++) {
                $result = $result->increment($browser);
            }
        }

        return $result;
    }
}
