<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Admin\CreateBlogRequest;
use App\Http\Requests\Blog\Admin\EditBlogMainImageRequest;
use App\Http\Requests\Blog\Admin\EditBlogRequest;
use Packages\Service\Blog\Query\InitBlogService;
use Packages\Service\Blog\Query\InProgressBlogService;

class AdminBlogController extends Controller {
    private InitBlogService $initBlogService;
    private InProgressBlogService $inProgressBlogService;

    public function __construct(
        InitBlogService $initBlogService,
        InProgressBlogService $inProgressBlogService
    ) {
        $this->initBlogService       = $initBlogService;
        $this->inProgressBlogService = $inProgressBlogService;
    }

    public function createBlog(CreateBlogRequest $request): void {
        $this->initBlogService->createBlog($request->ofDomain());
    }

    public function editBlog(EditBlogRequest $request): void {
        $this->inProgressBlogService->editBlog($request->ofDomain());
    }

    public function editBlogMainImage(EditBlogMainImageRequest $request): void {
        $this->inProgressBlogService->editBlogIcon($request->ofDomain());
    }
}
