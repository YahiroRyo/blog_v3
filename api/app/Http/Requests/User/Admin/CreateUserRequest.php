<?php

namespace App\Http\Requests\User\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\User\Entities\InitUser;
use Packages\Domain\User\ValueObjects\Email;
use Packages\Domain\User\ValueObjects\Password;

class CreateUserRequest extends FormRequest {
    public function authorize() : bool {
        return true;
    }

    public function rules() : array {
        return [
        ];
    }

    public function ofDomain() : InitUser {
        return new InitUser(
            Email::of($this->email),
            Password::of($this->password)
        );
    }
}
