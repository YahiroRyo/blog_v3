<?php

namespace Tests\Feature\Blog\Client;

use Tests\Feature\Blog\BlogTestCase;

class ActiveBlogListTest extends BlogTestCase {
    public function test_公開されているブログの一覧取得を行う(): void {
        $response = $this->get('/api/blogs');
        $response->assertOk();
        $response->assertJson($this->activeBlogService->activeBlogList());
    }
}
