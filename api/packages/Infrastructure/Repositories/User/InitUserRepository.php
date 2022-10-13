<?php

namespace Packages\Infrastructure\Repositories\User;

use Illuminate\Support\Facades\DB;
use Packages\Domain\User\Entities\InitUser;
use Packages\Infrastructure\Repositories\Exceptions\User\FailInitUserException;
use Packages\Infrastructure\Repositories\Exceptions\User\IllegalExistsUserException;

final class InitUserRepository {
    public function createUser(InitUser $initUser) : void {
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

        DB::transaction(function () use ($initUser) {
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
        }, 3);
    }
}
