<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\End;
use Packages\Domain\Blog\ValueObjects\Start;

class AccessesNumDetailBlogRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): AccessesNumDetailBlog {
        return new AccessesNumDetailBlog(
            BlogId::of($this->blogId),
            Start::of($this->start),
            End::of($this->end)
        );
    }
}
