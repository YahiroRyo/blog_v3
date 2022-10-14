<?php

namespace Tests\Feature\Blog\Admin;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Storage;
use Tests\DBSetUpTestCase;

class EditBlogMainImageTest extends DBSetUpTestCase {
    public function test_ブログメインイメージの編集を行う(): void {
        Storage::fake('files');
        $mainImage = UploadedFile::fake()->image('dummy.jpg', 800, 800);

        $preBlog = Blog::with('content')->first();
        $preBlog->fill(['updatedAt' => Carbon::now()->subDay()])
            ->save();

        $request  = [
            'blogId'    => $preBlog->blogId,
            'mainImage' => $mainImage,
        ];

        $response = $this->put('/api/admin/blogs/mainImage', $request);
        $response->assertOk();

        $blog = Blog::with('content')->find($preBlog->blogId);

        $this->assertNotEquals([
            'thumbnail' => $preBlog->content->thumbnail,
        ], [
            'thumbnail' => $blog->content->thumbnail,
        ]);
    }
}
