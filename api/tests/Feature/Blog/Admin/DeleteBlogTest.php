<?php

namespace Tests\Feature\Blog\Admin;

use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\DBSetUpTestCase;

class DeleteBlogTest extends DBSetUpTestCase {
    public function test_ブログの削除を行う(): void {
        $preBlog = Blog::first();

        $request  = [
            'blogId' => $preBlog->blogId,
        ];

        $response = $this->delete('/api/blogs', $request);
        $response->assertOk();

        $this->assertTrue(Blog::find($preBlog->blogId) === null);
    }
}
