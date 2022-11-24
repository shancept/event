<?php

declare(strict_types=1);

namespace Shancept\Event;

final class Event
{
    /**
     * @var array<string, array<int, callable>>
     */
    private static array $events = [];

    /**
     * @psalm-param class-string $name
     */
    public static function listen(string $name, callable $callback): void
    {
        self::$events[$name][] = $callback;
    }

    public static function trigger(EventInterface $event): void
    {
        $name = get_class($event);
        foreach (self::$events[$name] ?? [] as $callback) {
            $callback($event);
        }
    }

    public static function reset(): void
    {
        self::$events = [];
    }
}
