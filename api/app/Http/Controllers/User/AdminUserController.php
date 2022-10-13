<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Admin\CreateUserRequest;
use App\Http\Requests\User\Admin\LoginRequest;
use Packages\Service\User\Query\InitUserService;
use Packages\Service\User\Query\UserAuthService;

class AdminUserController extends Controller {
    private InitUserService $initUserService;
    private UserAuthService $userAuthService;

    public function __construct(
        InitUserService $initUserService,
        UserAuthService $userAuthService
    ) {
        $this->initUserService = $initUserService;
        $this->userAuthService = $userAuthService;
    }

    public function createUser(CreateUserRequest $request): void {
        $this->initUserService->createUser($request->ofDomain());
    }

    public function login(LoginRequest $request): void {
        $this->userAuthService->login($request->ofDomain());
    }

    public function logout(): void {
        $this->userAuthService->logout();
    }
}
