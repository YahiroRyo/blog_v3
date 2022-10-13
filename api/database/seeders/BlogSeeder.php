<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Packages\Infrastructure\Eloquent\Blog\ActiveBlog;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Packages\Infrastructure\Eloquent\Blog\BlogContent;
use Packages\Infrastructure\Eloquent\Blog\NonActiveBlog;

class BlogSeeder extends Seeder {
    public function run(): void {
        Blog::factory(10)
            ->create()
            ->each(function (Blog $blog, int $index) {
                BlogContent::factory(1)->create(['blogId' => $blog->blogId]);

                if ($index % 2 === 0) {
                    ActiveBlog::create(['blogId' => $blog->blogId]);
                    return;
                }
                NonActiveBlog::create(['blogId' => $blog->blogId]);
            });
    }
}
