<?php

declare(strict_types=1);

namespace Shancept\Event\Example;

use Psr\Container\ContainerInterface;
use Shancept\Event\Event;
use Shancept\Event\Example\Event\Subscriber;
use Shancept\Event\Example\Event\SuccessUserRegistrationEvent;
use Shancept\Event\Example\User\User;
use Shancept\Event\Example\User\UserRepositoryInterface;

require_once dirname(__DIR__) . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = new Container();

/** @var Subscriber $suscriber */
$suscriber = $container->get(Subscriber::class);
$suscriber->subscribe();

/** @var UserRepositoryInterface $userRepository */
$userRepository = $container->get(Subscriber::class);

$userRepository->save(new User($userId = 'test123', 1));
Event::trigger(new SuccessUserRegistrationEvent($userId, new \DateTimeImmutable()));
