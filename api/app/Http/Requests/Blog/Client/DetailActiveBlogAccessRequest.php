<?php

namespace App\Http\Requests\Blog\Client;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;
use Packages\Domain\Blog\ValueObjects\BlogId;
use Packages\Domain\Blog\ValueObjects\From;
use Packages\Domain\Blog\ValueObjects\Headers;
use Packages\Domain\Blog\ValueObjects\Referer;
use Packages\Domain\Blog\ValueObjects\UserAgent;

class DetailActiveBlogAccessRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): DetailActiveBlogAccess {
        return new DetailActiveBlogAccess(
            BlogId::of($this->blogId),
            Headers::of($this->headers),
            UserAgent::of($this->userAgent),
            Referer::of($this->referer),
            From::of($this->from)
        );
    }
}
