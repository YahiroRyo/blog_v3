<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Admin\CreateBlogRequest;
use App\Http\Requests\Blog\Admin\DeleteBlogRequest;
use App\Http\Requests\Blog\Admin\DetailBlogRequest;
use App\Http\Requests\Blog\Admin\EditBlogMainImageRequest;
use App\Http\Requests\Blog\Admin\EditBlogRequest;
use Packages\Service\Blog\Command\BlogService;
use Packages\Service\Blog\Command\DetailBlogService;
use Packages\Service\Blog\Query\InitBlogService;
use Packages\Service\Blog\Query\InProgressBlogService;
use Packages\Service\Blog\Query\DeleteBlogService;

class AdminBlogController extends Controller {
    private InitBlogService $initBlogService;
    private InProgressBlogService $inProgressBlogService;
    private DeleteBlogService $deleteBlogService;
    private BlogService $blogService;
    private DetailBlogService $detailBlogService;

    public function __construct(
        InitBlogService $initBlogService,
        InProgressBlogService $inProgressBlogService,
        DeleteBlogService $deleteBlogService,
        BlogService $blogService,
        DetailBlogService $detailBlogService
    ) {
        $this->initBlogService             = $initBlogService;
        $this->inProgressBlogService       = $inProgressBlogService;
        $this->deleteBlogService           = $deleteBlogService;
        $this->blogService                 = $blogService;
        $this->detailBlogService           = $detailBlogService;
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

    public function deleteBlog(DeleteBlogRequest $request): void {
        $this->deleteBlogService->deleteBlog($request->ofDomain());
    }

    public function blogList(): array {
        return $this->blogService->blogList();
    }

    public function blog(DetailBlogRequest $request): array {
        return $this->detailBlogService->blog($request->ofDomain());
    }
}
