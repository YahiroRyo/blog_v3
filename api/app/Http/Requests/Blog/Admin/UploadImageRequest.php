<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Base64;
use Packages\Domain\Blog\Entities\InitBlogImage;
use Packages\Domain\Blog\ValueObjects\BlogImage;
use Packages\Domain\Blog\ValueObjects\BlogThumbnail;

class UploadImageRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): InitBlogImage {
        return new InitBlogImage(
            BlogImage::of($this->image),
            BlogThumbnail::of($this->image)
        );
    }
}
