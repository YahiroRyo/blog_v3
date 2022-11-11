<?php

namespace Packages\Domain\Blog\ValueObjects;

final class ImageStoragePath {
    private const THUMBNAIL_STORAGE_PATH  = 'images/blogs/thumb';
    private const MAIN_IMAGE_STORAGE_PATH = 'images/blogs';

    public function __construct() {
    }

    public function thumbnailStoragePath(): string {
        return self::THUMBNAIL_STORAGE_PATH;
    }

    public function mainImageStoragePath(): string {
        return self::MAIN_IMAGE_STORAGE_PATH;
    }
}
