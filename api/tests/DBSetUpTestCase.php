<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;

abstract class DBSetUpTestCase extends TestCase {
    protected bool $useRefresh = true;
    protected bool $useSeed    = true;

    public function setUp() : void {
        parent::setUp();

        if ($this->useRefresh) {
            Artisan::call('migrate:fresh --path=database/migrations/**');
        }
        if ($this->useSeed) {
            Artisan::call('db:seed');
        }
    }
}
