<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Illuminate\Support\Facades\DB;
use Packages\Domain\Blog\Entities\InitBlog;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Infrastructure\Repositories\Exceptions\Blog\FailCreateBlogException;
use Rorecek\Ulid\Ulid;

final class InitBlogRepository {
    public function createBlog(
        InitBlog $initBlog,
        ThumbnailUrl $thumbnailUrl
    ): void {
        DB::transaction(function () use ($initBlog, $thumbnailUrl) {
            $blogId = (new Ulid())->generate();

            $isSuccess = DB::insert('
                INSERT INTO blogs (
                    blogId
                )
                VALUES (?)
            ', [$blogId]);

            if (!$isSuccess) {
                throw new FailCreateBlogException();
            }

            $isSuccess = DB::insert('
                INSERT INTO blogContents (
                    blogId,
                    title,
                    body,
                    thumbnail
                )
                VALUES (?, ?, ?, ?)
            ', [
                $blogId,
                $initBlog->title()->value(),
                $initBlog->body()->value(),
                $thumbnailUrl->value()
            ]);

            if (!$isSuccess) {
                throw new FailCreateBlogException();
            }

            $isSuccess = DB::insert('
                INSERT INTO nonActiveBlogs (
                    blogId
                )
                VALUES (?)
            ', [
                $blogId
            ]);

            if (!$isSuccess) {
                throw new FailCreateBlogException();
            }
        });
    }
}
