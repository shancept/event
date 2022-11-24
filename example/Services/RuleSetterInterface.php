<?php

declare(strict_types=1);

namespace Shancept\Event\Example\Services;

use Shancept\Event\Example\User\User;

interface RuleSetterInterface
{
    public function setRule1(User $user): void;
}
