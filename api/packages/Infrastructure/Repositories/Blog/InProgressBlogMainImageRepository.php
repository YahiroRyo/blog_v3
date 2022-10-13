<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Carbon\Carbon;
use DB;
use Packages\Domain\Blog\Entities\InProgressBlogMainImage;
use Packages\Domain\Blog\ValueObjects\ThumbnailUrl;
use Packages\Infrastructure\Repositories\Exceptions\Blog\FailEditBlogMainImageException;

final class InProgressBlogMainImageRepository {
    public function editBlogIcon(InProgressBlogMainImage $inProgressBlogMainImage, ThumbnailUrl $thumbnailUrl): void {
        DB::transaction(function () use ($inProgressBlogMainImage, $thumbnailUrl) {
            $isSuccess = DB::update('
                UPDATE blogContents
                SET
                    thumbnail = ?
                WHERE
                    blogId = ?
            ', [
                $thumbnailUrl->value(),
                $inProgressBlogMainImage->blogId()->value(),
            ]);

            if (!$isSuccess) {
                throw new FailEditBlogMainImageException();
            }

            $isSuccess = DB::update('
                UPDATE blogs
                SET
                    updatedAt = ?
                WHERE
                    blogId = ?
            ', [
                Carbon::now(),
                $inProgressBlogMainImage->blogId()->value()
            ]);

            if (!$isSuccess) {
                throw new FailEditBlogMainImageException();
            }
        });
    }
}
