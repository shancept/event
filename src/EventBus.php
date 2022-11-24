<?php

declare(strict_types=1);

namespace Shancept\Event;

final class EventBus
{
    /** @param EventInterface[] $events */
    public function dispatch(array $events): void
    {
        foreach ($events as $event) {
            Event::trigger($event);
        }
    }
}
