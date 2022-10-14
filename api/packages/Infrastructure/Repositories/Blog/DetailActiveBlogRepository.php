<?php

namespace Packages\Infrastructure\Repositories\Blog;

use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Packages\Domain\Blog\Entities\DetailActiveBlog;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class DetailActiveBlogRepository {
    public function detailActiveBlog(BlogId $blogId): DetailActiveBlog {
        $blog = DB::selectone('
            SELECT
                blogs.blogId                    as blogId,
                blogContents.title              as title,
                blogContents.body               as body,
                blogContents.thumbnail          as thumbnail
            FROM blogs
            INNER JOIN activeBlogs
                USING(blogId)
            INNER JOIN blogContents
                USING(blogId)
            WHERE
                blogs.blogId = ?
        ', [$blogId->value()]);

        if (!$blog) {
            throw new ModelNotFoundException('ブログが存在しません');
        }

        return new DetailActiveBlog(
            Title::of($blog->title),
            Body::of($blog->body),
            ThumbnailUrl::of($blog->thumbnail),
        );
    }
}
