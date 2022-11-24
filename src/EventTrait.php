<?php

declare(strict_types=1);

namespace Shancept\Event;

trait EventTrait
{
    /** @var EventInterface[] */
    private array $recordedEvents = [];

    /**
     * @return array<int, EventInterface>
     */
    public function releaseEvents(): array
    {
        $events = $this->recordedEvents;
        $this->recordedEvents = [];
        return $events;
    }

    public function recordEvent(EventInterface $event): void
    {
        $this->recordedEvents[] = $event;
    }
}
