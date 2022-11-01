<?php

namespace Tests;

use Packages\Infrastructure\Eloquent\User\ActiveUser;
use Packages\Infrastructure\Eloquent\User\User;

abstract class DBSetUpTestCase extends TestCase {
    protected bool $login = true;

    private function login() {
        if ($this->login) {
            $user = User::create([
                'email'    => 'login@a.aa',
                'password' => bcrypt('password')
            ]);
            ActiveUser::create(['userId' => $user->userId]);
            $this->actingAs($user);
            return;
        }

        ActiveUser::query()->delete();
        User::query()->delete();
    }

    public function setUp(): void {
        parent::setUp();

        $this->login();
    }
}
