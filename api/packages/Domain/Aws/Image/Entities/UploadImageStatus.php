<?php

namespace Packages\Domain\Aws\Image\Entities;

use GuzzleHttp\Promise\Promise;
use Packages\Domain\Aws\Image\ValueObjects\ImageUrl;

final class UploadImageStatus {
    private ImageUrl $imageUrl;
    private ?Promise $promise;

    public function __construct(
        ImageUrl $imageUrl,
        ?Promise $promise,
    ) {
        $this->imageUrl = $imageUrl;
        $this->promise  = $promise;
    }

    public function waitUploadImage(): ImageUrl {
        if ($this->promise) {
            $this->promise->wait();
        }

        return $this->imageUrl;
    }

    public function imageUrl(): ImageUrl {
        return $this->imageUrl;
    }
}
