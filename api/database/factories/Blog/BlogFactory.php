<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Packages\Infrastructure\Eloquent\Blog\Blog;
use Rorecek\Ulid\Ulid;

class BlogFactory extends Factory {
    protected $model = Blog::class;

    public function definition(): array {
        return [
            'blogId' => (new Ulid())->generate(),
        ];
    }
}
