<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\ValueObjects\FileName;
use Packages\Domain\Aws\Image\ValueObjects\Path;
use Packages\Domain\Blog\ValueObjects\ImageStoragePath;
use Packages\Domain\Blog\ValueObjects\MainImage;
use Packages\Domain\Blog\ValueObjects\Thumbnail;
use Packages\Infrastructure\Aws\Image\Upload\LocalUploadImage;
use Packages\Infrastructure\Eloquent\Blog\BlogContent;

class BlogContentFactory extends Factory {
    protected $model = BlogContent::class;

    public function definition(): array {
        Storage::fake('files');
        $mainImage   = UploadedFile::fake()->image('dummy.jpg', 800, 800);
        $uploadImage = new LocalUploadImage();

        $thumbnail        = Thumbnail::of($mainImage);
        $mainImage        = MainImage::of($mainImage);
        $imageStoragePath = new ImageStoragePath();

        $initUploadThumbnail = new InitUploadImage(
            $thumbnail->value(),
            Path::of($imageStoragePath->thumbnailStoragePath()),
            FileName::of('')
        );
        $tmpThumbnailPath = $uploadImage->tmpSaveImageFile($initUploadThumbnail);
        $imageUrl         = $uploadImage->upload($initUploadThumbnail, $tmpThumbnailPath);

        $initUploadMainImage = new InitUploadImage(
            $mainImage->value(),
            Path::of($imageStoragePath->mainImageStoragePath()),
            $initUploadThumbnail->fileName()
        );
        $tmpMainImagePath = $uploadImage->tmpSaveImageFile($initUploadMainImage);
        $uploadImage->upload($initUploadMainImage, $tmpMainImagePath);

        return [
            'title'     => $this->faker->realText(random_int(10, 100)),
            'body'      => $this->faker->realText(random_int(10, 2000)),
            'thumbnail' => $imageUrl->value(),
        ];
    }
}
