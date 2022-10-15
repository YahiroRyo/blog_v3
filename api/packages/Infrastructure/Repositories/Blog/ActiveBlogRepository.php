<?php

namespace Packages\Infrastructure\Repositories\Blog;

use DB;
use Packages\Domain\Blog\Entities\ActiveBlog;
use Packages\Domain\Blog\Entities\ActiveBlogList;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Domain\Blog\ValueObjects\Title;

final class ActiveBlogRepository {
    public function activeBlogList(): ActiveBlogList {
        $result = new ActiveBlogList([]);

        $activeBlogList = DB::select('
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
        ');

        foreach ($activeBlogList as $activeBlog) {
            $result = $result->add(new ActiveBlog(
                BlogId::of($activeBlog->blogId),
                Title::of($activeBlog->title),
                Body::of($activeBlog->body),
                ThumbnailUrl::of($activeBlog->thumbnail),
            ));
        }

        return $result;
    }
}
