<?php

namespace Tests\Feature\User\Admin;

use Packages\Infrastructure\Eloquent\User\ActiveUser;
use Packages\Infrastructure\Eloquent\User\User;
use Tests\DBSetUpTestCase;

class LoginUserTest extends DBSetUpTestCase {
    protected bool $login   = false;

    public function test_ログインを行う(): void {
        $email    = 'login@a.aa';
        $password = 'password';

        $user = User::create([
            'email'    => $email,
            'password' => bcrypt($password)
        ]);
        ActiveUser::create(['userId' => $user->userId]);

        $request  = [
            'email'     => $email,
            'password'  => $password
        ];

        $response = $this->post('/users/login', $request);
        $response->assertOk();
    }
}
