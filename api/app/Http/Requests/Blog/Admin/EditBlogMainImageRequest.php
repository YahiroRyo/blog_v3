<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\Entities\InProgressBlogMainImage;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\MainImage;
use Packages\Domain\Blog\ValueObjects\Thumbnail;

class EditBlogMainImageRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): InProgressBlogMainImage {
        return new InProgressBlogMainImage(
            BlogId::of($this->blogId),
            Thumbnail::of($this->mainImage),
            MainImage::of($this->mainImage),
        );
    }
}
