<?php

namespace Tests\Feature\Blog\Admin;

use Carbon\Carbon;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\Feature\Blog\BlogTestCase;

class AccessesNumDetailBlogTest extends BlogTestCase {
    public function test_ブログのアクセス数を取得(): void {
        $blogId = Blog::first()->blogId;

        $start = Carbon::now()->toDateString();
        $end   = Carbon::now()->addDays(30)->toDateString();

        $response = $this->get("/api/admin/blogs/{$blogId}/accessesNum?start={$start}&end={$end}");
        $response->assertOk();
    }
}
