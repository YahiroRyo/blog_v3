<?php

namespace Tests\Feature\Blog\Admin;

use Tests\Feature\Blog\BlogTestCase;

class BlogListTest extends BlogTestCase {
    public function test_ブログの一覧取得を行う(): void {
        $response = $this->get('/api/admin/blogs');
        $response->assertOk();
        $response->assertJson($this->blogService->blogList());
    }
}
