<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Carbon\Carbon;
use DB;
use Packages\Domain\Blog\Entities\InProgressBlog;
use Packages\Infrastructure\Repositories\Exceptions\Blog\FailEditBlogException;

final class InProgressBlogRepository {
    public function editBlog(InProgressBlog $inProgressBlog): void {
        DB::transaction(function () use ($inProgressBlog) {
            $isSuccess = DB::update('
                UPDATE blogContents
                SET
                    title = ?,
                    body = ?
                WHERE
                    blogId = ?
            ', [
                $inProgressBlog->title()->value(),
                $inProgressBlog->body()->value(),
                $inProgressBlog->blogId()->value()
            ]);

            if (!$isSuccess) {
                throw new FailEditBlogException();
            }

            $isSuccess = DB::update('
                UPDATE blogs
                SET
                    updatedAt = ?
                WHERE
                    blogId = ?
            ', [
                Carbon::now(),
                $inProgressBlog->blogId()->value()
            ]);

            if (!$isSuccess) {
                throw new FailEditBlogException();
            }
        });
    }
}
