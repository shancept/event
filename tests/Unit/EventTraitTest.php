<?php
// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

namespace Shancept\Event\Test\Unit;

use PHPUnit\Framework\TestCase;
use Shancept\Event\Event;
use Shancept\Event\EventInterface;
use Shancept\Event\EventTrait;

/**
 * @covers \Shancept\Event\EventTrait
 *
 * @internal
 */
class EventTraitTest extends TestCase
{
    protected function setUp(): void
    {
        Event::reset();
    }

    public function test(): void
    {
        $someClass = new class {
            use EventTrait;
        };

        $someClass->recordEvent(
            new class implements EventInterface {
            }
        );
        $someClass->recordEvent(
            new class implements EventInterface {
            }
        );

        $releaseEvents = $someClass->releaseEvents();
        $this->assertCount(2, $releaseEvents);
    }

}