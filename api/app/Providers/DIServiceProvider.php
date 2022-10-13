<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Infrastructure\Aws\Image\Upload\LocalUploadImage;
use Packages\Infrastructure\Aws\Image\Upload\S3UploadImage;
use Packages\Infrastructure\Aws\Image\Upload\UploadImage;

class DIServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->bindUploadImage();
    }

    public function boot(): void {
    }

    private function bindUploadImage(): void {
        if (app()->isProduction()) {
            $this->app->bind(
                UploadImage::class,
                S3UploadImage::class,
            );
            return;
        }

        $this->app->bind(
            UploadImage::class,
            LocalUploadImage::class,
        );
    }
}
