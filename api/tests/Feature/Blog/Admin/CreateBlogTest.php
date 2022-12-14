<?php

namespace Tests\Feature\Blog\Admin;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\DBSetUpTestCase;

class CreateUserTest extends DBSetUpTestCase {
    public function test_ブログの作成を行う(): void {
        Storage::fake('files');
        $mainImage = UploadedFile::fake()->image('dummy.jpg', 800, 800);

        $request  = [
            'title'     => 'タイトル',
            'body'      => 'ボディー',
            'mainImage' => $mainImage,
        ];

        $response = $this->post('/api/admin/blogs', $request);
        $response->assertOk();

        unset($request['mainImage']);

        $blog = Blog::orderBy('blogId', 'desc')->first();

        $this->assertEquals($request, [
            'title' => $blog->content->title,
            'body'  => $blog->content->body,
        ]);
    }
}
