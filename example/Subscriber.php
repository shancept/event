<?php

namespace Shancept\Event\Example\Event;


use Shancept\Event\Event;

class Subscriber
{
    private SuccessUserRegistrationHandler $handler;

    public function __construct(SuccessUserRegistrationHandler $handler)
    {
        $this->handler = $handler;
    }

    public function subscribe(): void
    {
        $handler = $this->handler;
        Event::listen(SuccessUserRegistrationEvent::class, static function ($event) use($handler) {
            $handler->handle($event);
        });
    }
}