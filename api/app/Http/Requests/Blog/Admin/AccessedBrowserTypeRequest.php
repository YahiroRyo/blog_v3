<?php

namespace App\Http\Requests\Blog\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\Entities\ForGetAccessedBrowserType;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\End;
use Packages\Domain\Blog\ValueObjects\Start;

class AccessedBrowserTypeRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): ForGetAccessedBrowserType {
        return new ForGetAccessedBrowserType(
            BlogId::of($this->blogId),
            Start::of($this->start),
            End::of($this->end)
        );
    }
}
