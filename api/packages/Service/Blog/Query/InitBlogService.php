<?php

namespace Packages\Service\Blog\Query;

use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\ValueObjects\FileName;
use Packages\Domain\Aws\Image\ValueObjects\Path;
use Packages\Domain\Blog\Entities\InitBlog;
use Packages\Domain\Blog\ValueObjects\ImageStoragePath;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Infrastructure\Aws\Image\Upload\UploadImage;
use Packages\Infrastructure\Repositories\Blog\InitBlogRepository;

final class InitBlogService {
    private InitBlogRepository $initBlogRepository;
    private UploadImage $uploadImage;

    public function __construct(
        InitBlogRepository $initBlogRepository,
        UploadImage $uploadImage
    ) {
        $this->initBlogRepository = $initBlogRepository;
        $this->uploadImage        = $uploadImage;
    }

    public function createBlog(InitBlog $initBlog): void {
        $imageStoragePath = new ImageStoragePath();

        $initMainImage = new InitUploadImage(
            $initBlog->mainImage()->value(),
            Path::of($imageStoragePath->mainImageStoragePath()),
            FileName::of('')
        );
        $tmpMainImageFilePath  = $this->uploadImage->tmpSaveImageFile($initMainImage);
        $uploadMainImageStatus = $this->uploadImage->upload($initMainImage, $tmpMainImageFilePath);

        $initThumbnail = new InitUploadImage(
            $initBlog->thumbnail()->value(),
            Path::of($imageStoragePath->thumbnailStoragePath()),
            $initMainImage->fileName()
        );
        $tmpThumbanilFilePath          = $this->uploadImage->tmpSaveImageFile($initThumbnail);
        $uploadThumbnailImageStatus    = $this->uploadImage->upload($initThumbnail, $tmpThumbanilFilePath);

        $this->initBlogRepository->createBlog(
            $initBlog,
            ThumbnailUrl::of($uploadThumbnailImageStatus->waitUploadImage()->value())
        );

        $uploadMainImageStatus->waitUploadImage();
    }
}
