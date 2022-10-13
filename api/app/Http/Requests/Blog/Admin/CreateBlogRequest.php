<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\Entities\InitBlog;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\MainImage;
use Packages\Domain\Blog\ValueObjects\Thumbnail;
use Packages\Domain\Blog\ValueObjects\Title;

class CreateBlogRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): InitBlog {
        return new InitBlog(
            Title::of($this->title),
            Body::of($this->body),
            MainImage::of($this->mainImage),
            Thumbnail::of($this->mainImage)
        );
    }
}
