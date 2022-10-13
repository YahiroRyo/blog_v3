<?php

namespace Tests\Feature\User\Admin;

use Packages\Infrastructure\Eloquent\User\ActiveUser;
use Packages\Infrastructure\Eloquent\User\User;
use Tests\DBSetUpTestCase;

class CreateUserTest extends DBSetUpTestCase {
    protected bool $useSeed = false;
    protected bool $login   = false;

    public function test_ユーザーの作成を行う(): void {
        $password = 'password';
        $request  = [
            'email'     => 'a@a.aa',
            'password'  => $password
        ];

        $response = $this->post('/users/create', $request);
        $response->assertOk();

        $user = User::first();

        unset($request['password']);

        $this->assertEquals($request, [
            'email'     => $user->email,
        ]);
        $this->assertTrue(password_verify($password, $user->password));
        $this->assertTrue(ActiveUser::find($user->userId)->exists());
    }

    public function test_ユーザーが既に1つ以上作成されていた場合は500を返す(): void {
        $request = [
            'email'     => 'a@a.aa',
            'password'  => 'password'
        ];

        $response = $this->post('/users/create', $request);
        $response->assertOk();

        $response = $this->post('/users/create', $request);
        $response->assertStatus(500);
    }
}
