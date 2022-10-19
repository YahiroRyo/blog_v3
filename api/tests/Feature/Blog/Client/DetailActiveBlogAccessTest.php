<?php

namespace Tests\Feature\Blog\Client;

use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\Feature\Blog\BlogTestCase;

class DetailActiveBlogAccessTest extends BlogTestCase {
    public function test_ブログのアクセスログを取る(): void {
        $blog = Blog::has('active')->first();

        $response = $this->post("/api/blogs/{$blog->blogId}/access", [
            'headers'   => 'header',
            'userAgent' => 'userAgent',
            'referer'   => 'referer',
            'from'      => 'from',
        ]);
        $response->assertOk();
    }
}
