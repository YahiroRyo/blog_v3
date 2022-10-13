<?php

namespace Packages\Domain\User\Entities;

use Packages\Domain\User\ValueObjects\Email;
use Packages\Domain\User\ValueObjects\Password;

final class InitLoginUser {
    private Email $email;
    private Password $password;

    public function __construct(
        Email $email,
        Password $password
    ) {
        $this->email    = $email;
        $this->password = $password;
    }

    public function email(): Email {
        return $this->email;
    }

    public function password(): Password {
        return $this->password;
    }
}
