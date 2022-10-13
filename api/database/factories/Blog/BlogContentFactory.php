<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Packages\Infrastructure\Eloquent\Blog\BlogContent;

class BlogContentFactory extends Factory {
    protected $model = BlogContent::class;

    public function definition(): array {
        return [
            'title'     => $this->faker->realText(random_int(10, 100)),
            'body'      => $this->faker->realText(random_int(10, 2000)),
            'thumbnail' => $this->faker->imageUrl(),
        ];
    }
}
