<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Packages\Service\Blog\Command\ActiveBlogService;

class ClientBlogController extends Controller {
    private ActiveBlogService $activeBlogService;

    public function __construct(ActiveBlogService $activeBlogService) {
        $this->activeBlogService = $activeBlogService;
    }

    public function activeBlogList(): array {
        return $this->activeBlogService->activeBlogList();
    }
}
