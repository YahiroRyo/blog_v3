<?php

namespace Packages\Infrastructure\Repositories\User;

use Illuminate\Support\Facades\DB;
use Packages\Domain\User\Entities\InitUser;
use Packages\Domain\User\ValueObjects\Token;
use Packages\Infrastructure\Eloquent\User\User;
use Packages\Infrastructure\Repositories\Exceptions\User\FailInitUserException;
use Packages\Infrastructure\Repositories\Exceptions\User\IllegalExistsUserException;

final class InitUserRepository {
    public function createUser(InitUser $initUser): Token {
        $user = DB::selectOne('
            SELECT
                userId
            FROM users
            INNER JOIN activeUsers
                USING(userId)
        ');

        if ($user) {
            throw new IllegalExistsUserException();
        }

        $token = null;

        DB::transaction(function () use ($initUser, &$token) {
            $isSuccess = DB::insert('
                INSERT INTO users (
                    email,
                    password
                )
                VALUES (?, ?)
            ', [
                $initUser->email()->value(),
                $initUser->password()->hashValue()
            ]);

            if (!$isSuccess) {
                throw new FailInitUserException();
            }

            $user = DB::selectOne('
                SELECT
                    userId
                FROM users
                WHERE
                    email = ?
                ORDER BY userId desc
            ', [$initUser->email()->value()]);

            $isSuccess = DB::insert('
                INSERT INTO activeUsers (
                    userId
                )
                VALUES (?)
            ', [$user->userId]);


            if (!$isSuccess) {
                throw new FailInitUserException();
            }

            if (auth()->attempt(['email' => $initUser->email()->value(), 'password' => $initUser->password()->value()])) {
                $user = User::find(auth()->id());

                $user->tokens()->where('name', 'auth_token')->delete();
                $user->token = $user->createToken('auth_token')->plainTextToken;

                $token = Token::of($user->token);
            }
        }, 3);

        if (!$token) {
            throw new FailInitUserException();
        }

        return $token;
    }
}
