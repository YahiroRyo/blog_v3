<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Carbon\Carbon;
use DB;
use Packages\Domain\Blog\ValueObjects\BlogId;

final class DeleteBlogRepository {
    public function deleteBlog(BlogId $blogId): void {
        DB::transaction(function () use ($blogId) {
            DB::delete('
                DELETE FROM activeBlogs
                WHERE
                    blogId = ?
            ', [$blogId->value()]);
            DB::delete('
                DELETE FROM nonActiveBlogs
                WHERE
                    blogId = ?
            ', [$blogId->value()]);

            DB::delete('
                DELETE FROM blogContents
                WHERE
                    blogId = ?
            ', [$blogId->value()]);
            DB::delete('
                DELETE FROM blogs
                WHERE
                    blogId = ?
            ', [$blogId->value()]);
        });
    }
}
