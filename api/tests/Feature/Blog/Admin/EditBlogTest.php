<?php

namespace Tests\Feature\Blog\Admin;

use Carbon\Carbon;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Tests\DBSetUpTestCase;

class EditBlogTest extends DBSetUpTestCase {
    public function test_ブログの編集を行う(): void {
        $blog = Blog::first();
        $blog->fill(['updatedAt' => Carbon::now()->subDay()])
            ->save();

        $request  = [
            'blogId'    => $blog->blogId,
            'title'     => 'タイトル',
            'body'      => 'ボディー',
            'isActive'  => false,
        ];

        $response = $this->put('/api/blogs', $request);
        $response->assertOk();

        $blog = Blog::find($blog->blogId);

        $this->assertEquals($request, [
            'blogId'   => $blog->blogId,
            'title'    => $blog->content->title,
            'body'     => $blog->content->body,
            'isActive' => $blog->active !== null,
        ]);
    }
}
