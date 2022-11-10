<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\ValueObjects\BlogId;

class ForgetAccessedBrowserTypeRequest extends FormRequest {
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
