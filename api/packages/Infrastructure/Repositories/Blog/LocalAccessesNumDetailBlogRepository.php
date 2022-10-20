<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Carbon\Carbon;
use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Domain\Blog\ValueObjects\Access;
use Packages\Domain\Blog\ValueObjects\AccessDate;
use Packages\Domain\Blog\ValueObjects\AccessesNum;
use Packages\Domain\Blog\ValueObjects\AccessList;
use Packages\Infrastructure\Repositories\Blog\AccessesNumDetailBlogRepository;

final class LocalAccessesNumDetailBlogRepository implements AccessesNumDetailBlogRepository {
    public function get(AccessesNumDetailBlog $accessesNumDetailBlog): AccessList {
        $result = AccessList::of([]);

        $date = $accessesNumDetailBlog->start()->value()->diffInDays($accessesNumDetailBlog->end()->value());
        for ($i = 0; $i < $date; $i++) {
            $result = $result->add(new Access(
                AccessDate::of((new Carbon($accessesNumDetailBlog->start()->value()))->addDays($i)->toDateString()),
                AccessesNum::of(random_int(0, 100))
            ));
        }

        return $result;
    }
}
