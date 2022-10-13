<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Admin\CreateBlogRequest;
use Packages\Service\Blog\Query\InitBlogService;

class AdminBlogController extends Controller {
    private InitBlogService $initBlogService;

    public function __construct(InitBlogService $initBlogService) {
        $this->initBlogService = $initBlogService;
    }

    public function createBlog(CreateBlogRequest $request): void {
        $this->initBlogService->createBlog($request->ofDomain());
    }
}
