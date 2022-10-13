<?php

namespace Packages\Domain\Blog\ValueObjects;

use Packages\Domain\Url;

final class ThumbnailUrl extends Url {
    private ImageStoragePath $imageStoragePath;
    protected string $name = 'サムネイルURL';

    public function mainImage(): string {
        $this->imageStoragePath = new ImageStoragePath();

        return str_replace(
            $this->imageStoragePath->thumbnailStoragePath(),
            $this->imageStoragePath->mainImageStoragePath(),
            $this->value
        );
    }
}
