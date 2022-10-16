<?php

namespace Packages\Service\User\Query;

use Packages\Domain\User\Entities\InitUser;
use Packages\Infrastructure\Repositories\User\InitUserRepository;

final class InitUserService {
    private InitUserRepository $initUserRepository;

    public function __construct(InitUserRepository $initUserRepository) {
        $this->initUserRepository = $initUserRepository;
    }

    public function createUser(InitUser $initUser): array {
        return ['token' => $this->initUserRepository->createUser($initUser)->value()];
    }
}
