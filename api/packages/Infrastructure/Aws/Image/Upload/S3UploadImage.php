<?php

namespace Packages\Infrastructure\Aws\Image\Upload;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\ValueObjects\ImageUrl;
use Packages\Domain\Aws\Image\ValueObjects\TmpImageFilePath;
use Packages\Infrastructure\Aws\Exceptions\Image\FailUploadImageException;

final class S3UploadImage extends BaseUploadImage implements UploadImage {
    public function upload(InitUploadImage $initUploadImage, TmpImageFilePath $tmpImageFilePath): ImageUrl {
        $path = Storage::disk('s3')->putFileAs(
            $initUploadImage->path()->value(),
            new File($tmpImageFilePath->value()),
            $initUploadImage->fileName()->value(),
            'public'
        );

        if (!$path) {
            throw new FailUploadImageException();
        }

        return ImageUrl::of(Storage::disk('s3')->url($path));
    }
}
