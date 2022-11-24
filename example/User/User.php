<?php

declare(strict_types=1);

namespace Shancept\Event\Example\User;

final class User
{
    private string $id;
    private int $status;
    private bool $isRulesSet;

    public function __construct(string $id, int $status)
    {
        $this->id = $id;
        $this->status = $status;
        $this->isRulesSet = false;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function isRulesSet(): bool
    {
        return $this->isRulesSet;
    }

    public function setRules(): void
    {
        $this->isRulesSet = true;
    }
}
