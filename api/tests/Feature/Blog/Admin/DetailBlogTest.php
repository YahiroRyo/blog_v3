<?php

namespace Tests\Feature\Blog\Admin;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\Feature\Blog\BlogTestCase;

class DetailBlogTest extends BlogTestCase {
    public function test_ブログの詳細取得を行う(): void {
        $blog = Blog::first();

        $response = $this->get("/api/blogs/{$blog->blogId}");
        $response->assertOk();
        $response->assertJson($this->detailBlogService->blog(BlogId::of($blog->blogId)));
    }

    public function test_ブログが存在しなかった場合404が返ること(): void {
        $response = $this->get("/api/blogs/aaaaaaaaaaaaaaaaaaaaaaaaaa");
        $response->assertNotFound();
    }
}
