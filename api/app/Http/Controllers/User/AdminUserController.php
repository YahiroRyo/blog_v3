<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Admin\CreateUserRequest;
use Packages\Service\User\Query\InitUserService;

class AdminUserController extends Controller {
    private InitUserService $initUserService;

    public function __construct(InitUserService $initUserService) {
        $this->initUserService = $initUserService;
    }

    public function createUser(CreateUserRequest $request): void {
        $this->initUserService->createUser($request->ofDomain());
    }
}
