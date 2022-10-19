<?php

namespace Tests\Feature\Blog\Client;

use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\Feature\Blog\BlogTestCase;

class DetailActiveBlogTest extends BlogTestCase {
    public function test_公開されているブログの詳細取得を行う(): void {
        $blog = Blog::has('active')->first();

        $response = $this->get("/api/blogs/{$blog->blogId}");
        $response->assertOk();
        $response->assertJson($this->detailActiveBlogService->detailActiveBlog(BlogId::of($blog->blogId)));
    }

    public function test_公開されているブログが存在しなかった場合404が返ること(): void {
        $response = $this->get("/api/blogs/aaaaaaaaaaaaaaaaaaaaaaaaaa");
        $response->assertNotFound();
    }
}
