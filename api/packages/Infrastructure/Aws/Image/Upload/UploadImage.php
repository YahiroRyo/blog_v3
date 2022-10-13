<?php

namespace Packages\Infrastructure\Aws\Image\Upload;

use Packages\Domain\Aws\Image\ValueObjects\ImageUrl;
use Packages\Domain\Aws\Image\ValueObjects\TmpImageFilePath;
use Packages\Domain\Aws\Image\Entities\InitUploadImage;

interface UploadImage {
    public function tmpSaveImageFile(InitUploadImage $initUploadImage): TmpImageFilePath;
    public function upload(InitUploadImage $initUploadImage, TmpImageFilePath $tmpImageFilePath): ImageUrl;
}
