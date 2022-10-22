<?php

namespace Packages\Domain\Aws\Image\Entities;

use Intervention\Image\Image;
use Packages\Domain\Aws\Image\ValueObjects\FileName;
use Packages\Domain\Aws\Image\ValueObjects\Path;

final class InitUploadImage {
    private Image $image;
    private Path $path;
    private FileName $fileName;

    public function __construct(
        Image $image,
        Path $path,
        FileName $fileName,
    ) {
        $this->image    = $image;
        $this->path     = $path;
        $this->fileName = $fileName;
    }

    public function image(): Image {
        return $this->image;
    }

    public function path(): Path {
        return $this->path;
    }

    public function fileName(): FileName {
        return $this->fileName;
    }
}
