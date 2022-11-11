<?php

namespace App\Providers;

use Aws\S3\S3Client;
use Illuminate\Support\ServiceProvider;

class S3ServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->app->singleton(S3Client::class, function () {
            $client = new S3Client([
                'credentials' => [
                    'key'    => env('LMD_ID'),
                    'secret' => env('LMD_SECRET_KEY'),
                ],
                'region'  => env('LMD_REGION'),
                'version' => 'latest'
            ]);

            return $client;
        });
    }
}
