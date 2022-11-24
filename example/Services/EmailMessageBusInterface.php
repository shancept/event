<?php

declare(strict_types=1);

namespace Shancept\Event\Example\Services;

interface EmailMessageBusInterface
{
    public function send(string $template, \DateTimeImmutable $dateTime): void;
}
