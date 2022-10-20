<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Infrastructure\Aws\Image\Upload\LocalUploadImage;
use Packages\Infrastructure\Aws\Image\Upload\S3UploadImage;
use Packages\Infrastructure\Aws\Image\Upload\UploadImage;
use Packages\Infrastructure\Repositories\Blog\AccessesNumDetailBlogRepository;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Infrastructure\Repositories\Blog\LocalAccessesNumDetailBlogRepository;
use Packages\Infrastructure\Repositories\Blog\NoSQLDetailActiveBlogAccessRepository;
use Packages\Infrastructure\Repositories\Blog\LocalDetailActiveBlogAccessRepository;
use Packages\Infrastructure\Repositories\Blog\NoSQLAccessesNumDetailBlogRepository;

class DIServiceProvider extends ServiceProvider {
    private array $productionBinds = [
        UploadImage::class                          => S3UploadImage::class,
        DetailActiveBlogAccessRepository::class     => NoSQLDetailActiveBlogAccessRepository::class,
        AccessesNumDetailBlogRepository::class      => NoSQLAccessesNumDetailBlogRepository::class,
    ];
    private array $localBinds = [
        UploadImage::class                          => LocalUploadImage::class,
        DetailActiveBlogAccessRepository::class     => LocalDetailActiveBlogAccessRepository::class,
        AccessesNumDetailBlogRepository::class      => LocalAccessesNumDetailBlogRepository::class,
    ];

    public function register(): void {
        if (app()->isProduction()) {
            foreach ($this->productionBinds as $interface => $class) {
                $this->app->bind($interface, $class);
            }
            return;
        }

        foreach ($this->localBinds as $interface => $class) {
            $this->app->bind($interface, $class);
        }
    }

    public function boot(): void {
    }
}
