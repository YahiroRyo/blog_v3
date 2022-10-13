<?php

namespace App\Http\Requests\User\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\User\Entities\InitLoginUser;
use Packages\Domain\User\ValueObjects\Email;
use Packages\Domain\User\ValueObjects\Password;

class LoginRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): InitLoginUser {
        return new InitLoginUser(
            Email::of($this->email),
            Password::of($this->password)
        );
    }
}
