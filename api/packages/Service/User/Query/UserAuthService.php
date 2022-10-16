<?php

namespace Packages\Service\User\Query;

use Packages\Domain\User\Entities\InitLoginUser;
use Packages\Infrastructure\Repositories\User\UserAuthRepository;

final class UserAuthService {
    private UserAuthRepository $userAuthRepository;

    public function __construct(UserAuthRepository $userAuthRepository) {
        $this->userAuthRepository = $userAuthRepository;
    }

    public function login(InitLoginUser $initLoginUser): void {
        $this->userAuthRepository->login($initLoginUser);
    }

    public function logout(): void {
        $this->userAuthRepository->logout();
    }

    public function isLoggedIn(): array {
        return ['isLoggedIn' => $this->userAuthRepository->isLoggedIn() ];
    }
}
