<?php

declare(strict_types=1);

namespace Shancept\Event\Example\Services;

use Shancept\Event\Example\User\User;

interface EmailMessageTemplatesInterface
{
    public function newUser(User $user): string;
}
