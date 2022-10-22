<?php

namespace Packages\Infrastructure\Repositories\Blog;

use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;

final class LocalDetailActiveBlogAccessRepository implements DetailActiveBlogAccessRepository {
    public function access(DetailActiveBlogAccess $detailActiveBlogAccess): void {
        $blog = DB::selectOne('
            SELECT
                blogs.blogId
            FROM
                blogs
            INNER JOIN activeBlogs
                USING(blogId)
            WHERE
                blogs.blogId = ?
        ', [$detailActiveBlogAccess->blogId()->value()]);

        if (!$blog) {
            throw new ModelNotFoundException('ブログが存在しません');
        }
    }
}
