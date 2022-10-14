<?php

namespace Packages\Infrastructure\Repositories\Blog;

use DB;
use Packages\Domain\Blog\Entities\Blog;
use Packages\Domain\Blog\Entities\BlogList;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\IsActive;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class BlogRepository {
    public function blogList(): BlogList {
        $result = new BlogList([]);

        $blogList = DB::select('
            SELECT
                blogs.blogId                    as blogId,
                blogContents.title              as title,
                blogContents.body               as body,
                blogContents.thumbnail          as thumbnail,
                activeBlogs.blogId IS NOT NULL  as isActive
            FROM blogs
            LEFT JOIN activeBlogs
                USING(blogId)
            INNER JOIN blogContents
                USING(blogId)
        ');

        foreach ($blogList as $blog) {
            $result->add(new Blog(
                Title::of($blog->title),
                Body::of($blog->body),
                ThumbnailUrl::of($blog->thumbnail),
                IsActive::of($blog->isActive),
            ));
        }

        return $result;
    }
}
