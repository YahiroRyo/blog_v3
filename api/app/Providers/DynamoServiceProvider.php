<?php

namespace App\Providers;

use Aws\DynamoDb\DynamoDbClient;
use Aws\Sdk;
use Illuminate\Support\ServiceProvider;

class DynamoServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->app->singleton(DynamoDbClient::class, function () {
            $awsSdk = new Sdk([
                'credentials' => [
                    'key'    => env('LMD_ID'),
                    'secret' => env('LMD_SECRET_KEY'),
                ],
                'region'  => env('LMD_REGION'),
                'version' => 'latest'
            ]);

            return $awsSdk->createDynamoDb();
        });
    }
}
