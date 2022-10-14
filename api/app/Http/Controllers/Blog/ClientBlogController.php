<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Client\DetailActiveBlogRequest;
use Packages\Service\Blog\Command\ActiveBlogService;
use Packages\Service\Blog\Command\DetailActiveBlogService;

class ClientBlogController extends Controller {
    private ActiveBlogService $activeBlogService;
    private DetailActiveBlogService $detailActiveBlogService;

    public function __construct(
        ActiveBlogService $activeBlogService,
        DetailActiveBlogService $detailActiveBlogService
    ) {
        $this->activeBlogService       = $activeBlogService;
        $this->detailActiveBlogService = $detailActiveBlogService;
    }

    public function activeBlogList(): array {
        return $this->activeBlogService->activeBlogList();
    }

    public function detailActiveBlog(DetailActiveBlogRequest $request): array {
        return $this->detailActiveBlogService->detailActiveBlog($request->ofDomain());
    }
}
