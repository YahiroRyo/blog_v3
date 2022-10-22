<?php

namespace Packages\Domain;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as InterventionImage;
use Intervention\Image\Image as InterventionImageType;
use Rorecek\Ulid\Ulid;
use Symfony\Component\HttpFoundation\File\File;

abstract class Base64Image {
    protected InterventionImageType $value;

    protected int $width;
    protected int $height;
    protected int $maxSize;
    protected int $quality;
    protected string $name;

    private function toImage($value): UploadedFile {
        $mimetype  = explode(':', explode(';', $value)[0])[1];
        $randomStr = (new Ulid())->generate();

        $extension = str_replace('image/', '', $mimetype);
        $filePath  = "/tmp/{$randomStr}.{$extension}";

        file_put_contents($filePath, base64_decode(explode(',', $value)[1]));

        $tmpFile    = new File($filePath);
        $fileName   = $tmpFile->getFilename();

        return new UploadedFile($tmpFile->getPathname(), $fileName, $tmpFile->getMimeType(), null, true);
    }

    private function __construct($value) {
        $uploadedFile = $this->toImage($value);

        Validator::make(
            [$this->name => $uploadedFile],
            [$this->name => ["required", 'image', 'mimes:jpeg,png,jpg', "max:{$this->maxSize}"]],
            [
                'required'  => ':attributeは必須項目です',
                'image'     => ':attributeは画像である必要があります',
                'mimes'     => ':attributeはjpeg形式,png形式,jpg形式のいずれかである必要があります',
                'max'       => ':attributeは:maxKB以下である必要があります',
            ]
        )->validate();

        $this->value = InterventionImage::make($uploadedFile->getRealPath())->resize(
            $this->width,
            $this->height,
            function ($constraint) {
                $constraint->aspectRatio();
            }
        )
        ->resizeCanvas($this->width, $this->height)
        ->encode('jpeg', $this->quality);
    }

    public function value(): InterventionImageType {
        return $this->value;
    }

    public static function of($value): Base64Image {
        return new static($value);
    }
}
