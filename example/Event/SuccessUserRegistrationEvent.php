<?php

declare(strict_types=1);

namespace Shancept\Event\Example\Event;

use Shancept\Event\EventInterface;

final class SuccessUserRegistrationEvent implements EventInterface
{
    public string $userId;
    public \DateTimeImmutable $userRegDate;

    public function __construct(string $userId, \DateTimeImmutable $userRegDate)
    {
        $this->userId = $userId;
        $this->userRegDate = $userRegDate;
    }
}

