<?php

namespace Packages\Infrastructure\Aws\Image\Upload;

use Packages\Domain\Aws\Image\Entities\InitUploadImage;
use Packages\Domain\Aws\Image\ValueObjects\TmpImageFilePath;
use Rorecek\Ulid\Ulid;

class BaseUploadImage {
    public function tmpSaveImageFile(InitUploadImage $initUploadImage): TmpImageFilePath {
        $fileName = (new Ulid())->generate().'.jpg';

        $tmpFilePath = "/tmp/{$fileName}";

        $initUploadImage->image()->save($tmpFilePath);

        return TmpImageFilePath::of($tmpFilePath);
    }
}
