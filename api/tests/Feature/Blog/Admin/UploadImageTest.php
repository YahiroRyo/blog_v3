<?php

namespace Tests\Feature\Blog\Admin;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\Blog\BlogTestCase;

class UploadImageTest extends BlogTestCase {
    public function test_画像のアップロードを行う(): void {
        Storage::fake('files');
        $image = UploadedFile::fake()->image('dummy.jpg', 800, 800);

        $imageData   = file_get_contents($image->path());
        $imageBase64 = 'data:'.$image->getMimeType() . ';base64,' . base64_encode($imageData);

        $response = $this->post('/api/admin/blogs/image', [
            'image' => $imageBase64
        ]);
        $response->assertOk();
    }
}
