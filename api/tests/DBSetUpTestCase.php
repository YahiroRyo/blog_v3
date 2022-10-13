<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Packages\Infrastructure\Eloquent\User\User;

abstract class DBSetUpTestCase extends TestCase {
    protected bool $useRefresh = true;
    protected bool $useSeed    = true;
    protected bool $login      = true;

    public function setUp(): void {
        parent::setUp();

        if ($this->useRefresh) {
            Artisan::call('migrate:fresh --path=database/migrations/**');
        }
        if ($this->useSeed) {
            Artisan::call('db:seed');
        }
        if ($this->login) {
            $user = User::create([
                'email'    => 'login@a.aa',
                'password' => bcrypt('password')
            ]);
            $this->actingAs($user);
        }
    }
}
