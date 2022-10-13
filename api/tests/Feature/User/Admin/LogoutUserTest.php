<?php

namespace Tests\Feature\User\Admin;

use Tests\DBSetUpTestCase;

class LogoutUserTest extends DBSetUpTestCase {
    protected bool $useSeed = false;
    protected bool $login   = true;

    public function test_ログアウトを行う(): void {
        $response = $this->post('/users/logout');
        $response->assertOk();

        $this->assertFalse(auth()->check());
    }
}
