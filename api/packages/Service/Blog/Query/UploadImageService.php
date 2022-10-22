<?php

namespace Packages\Service\Blog\Query;

use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\ValueObjects\FileName;
use Packages\Domain\Aws\Image\ValueObjects\Path;
use Packages\Domain\Blog\Entities\InitBlogImage;
use Packages\Domain\Blog\ValueObjects\ImageStoragePath;
use Packages\Infrastructure\Aws\Image\Upload\UploadImage;

final class UploadImageService {
    private UploadImage $uploadImage;

    public function __construct(UploadImage $uploadImage) {
        $this->uploadImage = $uploadImage;
    }

    public function upload(InitBlogImage $initBlogImage): string {
        $imageStoragePath = new ImageStoragePath();

        $thumbnail = new InitUploadImage(
            $initBlogImage->thumbnail()->value(),
            Path::of($imageStoragePath->thumbnailStoragePath()),
            FileName::of('')
        );
        $image = new InitUploadImage(
            $initBlogImage->thumbnail()->value(),
            Path::of($imageStoragePath->mainImageStoragePath()),
            $thumbnail->fileName()
        );

        $tmpThumbnailFile = $this->uploadImage->tmpSaveImageFile($thumbnail);
        $tmpImageFile     = $this->uploadImage->tmpSaveImageFile($image);

        $this->uploadImage->upload($image, $tmpImageFile);
        $imageUrl = $this->uploadImage->upload($thumbnail, $tmpThumbnailFile);

        return $imageUrl->value();
    }
}
