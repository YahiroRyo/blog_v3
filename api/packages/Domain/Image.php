<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as InterventionImage;
use Intervention\Image\Image as InterventionImageType;

abstract class Image {
    protected InterventionImageType $value;

    protected int $width;
    protected int $height;
    protected int $maxSize;
    protected int $quality;
    protected string $name;

    private function __construct($value) {
        Validator::make(
            [$this->name => $value],
            [$this->name => ["required", 'image', 'mimes:jpeg,png,jpg', "max:{$this->maxSize}"]],
            [
                'required'  => ':attributeは必須項目です',
                'image'     => ':attributeは画像である必要があります',
                'mimes'     => ':attributeはjpeg形式,png形式,jpg形式のいずれかである必要があります',
                'max'       => ':attributeは:maxKB以下である必要があります',
            ]
        )->validate();

        $this->value = InterventionImage::make($value->getRealPath())->resize(
            $this->width,
            $this->height,
            function ($constraint) {
                $constraint->aspectRatio();
            }
        )
        ->resizeCanvas($this->width, $this->height)
        ->encode('webp', $this->quality);
    }

    public function value(): InterventionImageType {
        return $this->value;
    }

    public static function of($value): Image {
        return new static($value);
    }
}
