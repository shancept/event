<?php

declare(strict_types=1);

namespace Shancept\Event\Example\User;

interface UserRepositoryInterface
{
    /**
     * @param string $userId
     * @throws UserNotFoundException
     * @return User
     */
    public function getById(string $userId): User;

    /**
     * @param User $user
     * @return void
     */
    public function save(User $user): void;
}
