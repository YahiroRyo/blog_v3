<?php

namespace Tests\Feature\User\Admin;

use Packages\Infrastructure\Eloquent\User\ActiveUser;
use Packages\Infrastructure\Eloquent\User\User;
use Tests\DBSetUpTestCase;

class CreateUserTest extends DBSetUpTestCase {
    protected bool $useSeed = false;

    public function test_ユーザーの作成を行う() : void {
        $password = 'password';
        $request  = [
            'email'     => 'a@a.aa',
            'password'  => $password
        ];

        $response = $this->post('/api/users', $request);
        $response->assertOk();

        $user = User::first();

        unset($request['password']);

        $this->assertEquals($request, [
            'email'     => $user->email,
        ]);
        $this->assertTrue(password_verify($password, $user->password));
        $this->assertTrue(ActiveUser::find($user->userId)->exists());
    }
}
