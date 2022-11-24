<?php

declare(strict_types=1);

namespace Shancept\Event\Example\Event;

use Shancept\Event\Example\Services\EmailMessageBusInterface;
use Shancept\Event\Example\Services\EmailMessageTemplatesInterface;
use Shancept\Event\Example\Services\RuleSetterInterface;
use Shancept\Event\Example\User\UserRepositoryInterface;

final class SuccessUserRegistrationHandler
{
    private UserRepositoryInterface $userRepository;
    private EmailMessageBusInterface $emailMessageBus;
    private EmailMessageTemplatesInterface $emailMessageTemplates;
    private RuleSetterInterface $ruleSetter;

    public function __construct(
        UserRepositoryInterface $userRepository,
        EmailMessageBusInterface $emailMessageBus,
        EmailMessageTemplatesInterface $emailMessageTemplates,
        RuleSetterInterface $ruleSetter
    )
    {
        $this->userRepository = $userRepository;
        $this->emailMessageBus = $emailMessageBus;
        $this->emailMessageTemplates = $emailMessageTemplates;
        $this->ruleSetter = $ruleSetter;
    }

    public function handle(SuccessUserRegistrationEvent $event): void
    {
        $user = $this->userRepository->getById($event->userId);

        $this->emailMessageBus->send($this->emailMessageTemplates->newUser($user), $event->userRegDate);
        $this->ruleSetter->setRule1($user);
        $user->setRules();
        $this->userRepository->save($user);
    }
}
