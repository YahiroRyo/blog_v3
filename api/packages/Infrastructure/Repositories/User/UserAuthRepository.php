<?php

namespace Packages\Infrastructure\Repositories\User;

use DB;
use Hash;
use Illuminate\Auth\AuthenticationException;
use Packages\Domain\User\Entities\InitLoginUser;

final class UserAuthRepository {
    public function login(InitLoginUser $initLoginUser): void {
        $user = DB::selectOne('
            SELECT
                password
            FROM users
            INNER JOIN activeUsers
                USING(userId)
            WHERE
                users.email = ?
        ', [
            $initLoginUser->email()->value(),
        ]);

        if (!$user || !Hash::check($initLoginUser->password()->value(), $user->password)) {
            throw new AuthenticationException();
        }

        session()->regenerate();
    }

    public function logout(): void {
        auth()->logout();
    }

    public function isLoggedIn(): bool {
        return auth()->check();
    }
}
