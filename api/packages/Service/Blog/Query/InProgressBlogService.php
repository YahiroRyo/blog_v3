<?php

namespace Packages\Service\Blog\Query;

use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\ValueObjects\FileName;
use Packages\Domain\Aws\Image\ValueObjects\Path;
use Packages\Domain\Blog\Entities\InProgressBlog;
use Packages\Domain\Blog\Entities\InProgressBlogMainImage;
use Packages\Domain\Blog\ValueObjects\ImageStoragePath;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Infrastructure\Aws\Image\Upload\UploadImage;
use Packages\Infrastructure\Repositories\Blog\InProgressBlogMainImageRepository;
use Packages\Infrastructure\Repositories\Blog\InProgressBlogRepository;

final class InProgressBlogService {
    private InProgressBlogRepository $inProgressBlogRepository;
    private InProgressBlogMainImageRepository $inProgressBlogMainImageRepository;
    private UploadImage $uploadImage;

    public function __construct(
        InProgressBlogRepository $inProgressBlogRepository,
        InProgressBlogMainImageRepository $inProgressBlogMainImageRepository,
        UploadImage $uploadImage
    ) {
        $this->inProgressBlogRepository          = $inProgressBlogRepository;
        $this->inProgressBlogMainImageRepository = $inProgressBlogMainImageRepository;
        $this->uploadImage                       = $uploadImage;
    }

    public function editBlog(InProgressBlog $inProgressBlog) {
        $this->inProgressBlogRepository->editBlog($inProgressBlog);
    }

    public function editBlogIcon(InProgressBlogMainImage $inProgressBlogMainImage) {
        $imageStoragePath = new ImageStoragePath();

        $initMainImage = new InitUploadImage(
            $inProgressBlogMainImage->mainImage()->value(),
            Path::of($imageStoragePath->mainImageStoragePath()),
            FileName::of('')
        );
        $tmpMainImageFilePath  = $this->uploadImage->tmpSaveImageFile($initMainImage);
        $uploadMainImageStatus = $this->uploadImage->upload($initMainImage, $tmpMainImageFilePath);

        $initThumbnail = new InitUploadImage(
            $inProgressBlogMainImage->thumbnail()->value(),
            Path::of($imageStoragePath->thumbnailStoragePath()),
            $initMainImage->fileName()
        );
        $tmpThumbanilFilePath       = $this->uploadImage->tmpSaveImageFile($initThumbnail);
        $uploadThumbnailImageStatus = $this->uploadImage->upload($initThumbnail, $tmpThumbanilFilePath);

        $this->inProgressBlogMainImageRepository->editBlogIcon(
            $inProgressBlogMainImage,
            ThumbnailUrl::of($uploadThumbnailImageStatus->waitUploadImage()->value())
        );

        $uploadMainImageStatus->waitUploadImage();
    }
}
