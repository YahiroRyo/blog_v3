<?php

namespace App\Http\Requests\Blog\Client;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\ValueObjects\BlogId;

class DetailActiveBlogRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): BlogId {
        return BlogId::of($this->blogId);
    }
}
