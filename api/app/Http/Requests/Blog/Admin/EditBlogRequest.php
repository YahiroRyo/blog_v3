<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\Entities\InitBlog;
use Packages\Domain\Blog\Entities\InProgressBlog;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\Body;
use Packages\Domain\Blog\ValueObjects\Title;

class EditBlogRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): InProgressBlog {
        return new InProgressBlog(
            BlogId::of($this->blogId),
            Title::of($this->title),
            Body::of($this->body),
        );
    }
}
