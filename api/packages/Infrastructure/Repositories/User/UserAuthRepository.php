<?php

namespace Packages\Infrastructure\Repositories\User;

use Illuminate\Auth\AuthenticationException;
use Packages\Domain\User\Entities\InitLoginUser;
use Packages\Domain\User\ValueObjects\Token;
use Packages\Infrastructure\Eloquent\User\User;

final class UserAuthRepository {
    public function login(InitLoginUser $initLoginUser): Token {
        if (auth()->attempt(['email' => $initLoginUser->email()->value(), 'password' => $initLoginUser->password()->value()])) {
            $user = User::find(auth()->id());

            $user->tokens()->where('name', 'auth_token')->delete();
            $user->token = $user->createToken('auth_token')->plainTextToken;

            return Token::of($user->token);
        }
        throw new AuthenticationException();
    }

    public function logout(): void {
        auth()->logout();
    }

    public function isLoggedIn(): bool {
        return request()->user('sanctum') !== null;
    }
}
