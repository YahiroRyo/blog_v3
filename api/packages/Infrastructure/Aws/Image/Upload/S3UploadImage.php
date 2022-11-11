<?php

namespace Packages\Infrastructure\Aws\Image\Upload;

use Aws\S3\S3Client;
use Illuminate\Http\File;
use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\Entities\UploadImageStatus;
use Packages\Domain\Aws\Image\ValueObjects\ImageUrl;
use Packages\Domain\Aws\Image\ValueObjects\TmpImageFilePath;

final class S3UploadImage extends BaseUploadImage implements UploadImage {
    private S3Client $client;

    public function __construct(S3Client $client) {
        $this->client = $client;
    }

    public function upload(InitUploadImage $initUploadImage, TmpImageFilePath $tmpImageFilePath): UploadImageStatus {
        $bucket = env('LMD_BUCKET');
        $region = env('LMD_REGION');
        $key    = $initUploadImage->path()->value() . '/' . $initUploadImage->fileName()->value();

        $promise = $this->client->putObjectAsync([
            'ACL'           => 'public-read',
            'Bucket'        => $bucket,
            'Key'           => $key,
            'SourceFile'    => new File($tmpImageFilePath->value())
        ]);

        return new UploadImageStatus(
            ImageUrl::of("https://{$bucket}.s3.{$region}.amazonaws.com/{$key}"),
            $promise
        );
    }
}
