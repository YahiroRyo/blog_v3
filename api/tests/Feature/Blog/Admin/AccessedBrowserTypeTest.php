<?php

namespace Tests\Feature\Blog\Admin;

use Carbon\Carbon;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\Feature\Blog\BlogTestCase;

class AccessedBrowserTypeTest extends BlogTestCase {
    public function test_ブログのブラウザ割合を取得する(): void {
        $blogId = Blog::first()->blogId;

        $start = Carbon::now()->toDateString();
        $end   = Carbon::now()->addDays(30)->toDateString();

        $response = $this->get("/api/admin/blogs/{$blogId}/accessedBrowserType?start={$start}&end={$end}");
        $response->assertOk();
    }
}
