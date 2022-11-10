<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Aws\DynamoDb\DynamoDbClient;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Packages\Domain\Blog\Entities\DetailBlog;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\CreatedAt;
use Packages\Domain\Blog\ValueObjects\IsActive;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class DetailBlogRepository {
    public function blog(BlogId $blogId): DetailBlog {
        $blog = DB::selectOne('
            SELECT
                blogs.blogId                    as blogId,
                blogContents.title              as title,
                blogContents.body               as body,
                blogContents.thumbnail          as thumbnail,
                activeBlogs.blogId IS NOT NULL  as isActive,
                blogs.createdAt                 as createdAt
            FROM blogs
            LEFT JOIN activeBlogs
                USING(blogId)
            INNER JOIN blogContents
                USING(blogId)
            WHERE
                blogId = ?
        ', [$blogId->value()]);

        if (!$blog) {
            throw new ModelNotFoundException('ブログが存在しません');
        }

        return new DetailBlog(
            BlogId::of($blog->blogId),
            Title::of($blog->title),
            Body::of($blog->body),
            ThumbnailUrl::of($blog->thumbnail),
            CreatedAt::of($blog->createdAt),
            IsActive::of($blog->isActive),
        );
    }
}
