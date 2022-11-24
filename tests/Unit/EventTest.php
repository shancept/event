<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace Shancept\Event\Test\Unit;

use PHPUnit\Framework\TestCase;
use Shancept\Event\Event;
use Shancept\Event\EventInterface;

/**
 * @covers \Shancept\Event\Event
 *
 * @internal
 */
class EventTest extends TestCase
{
    protected function setUp(): void
    {
        Event::reset();
    }

    public function testFirstCase(): void
    {
        $resultEventHandler = new class {
            public array $log = [];
        };

        $event = new class implements EventInterface {

        };

        Event::listen(get_class($event), static function () use ($resultEventHandler) {
            $resultEventHandler->log[] = 'message';
        });
        self::assertEmpty($resultEventHandler->log);
        Event::trigger($event);
        self::assertEquals('message', $resultEventHandler->log[0]);
    }

    public function testSecondCase(): void
    {
        $resultEventHandler = new class {
            public array $log = [];
        };

        $event = new class implements EventInterface {

        };

        Event::listen(get_class($event), static function (EventInterface $event) use ($resultEventHandler) {
            $resultEventHandler->log[] = $event;
        });
        self::assertEmpty($resultEventHandler->log);
        Event::trigger($event);
        self::assertEquals($event, $resultEventHandler->log[0]);
    }

}