# Events

Events allow you to insert custom code into existing code at specific points in execution. You can attach custom code to an event so that when the event fires, the code is automatically executed.

### install:

```bash
composer require shancept/event
```

### Usage:
#### first case
1. create event class implements [EventInterface](/src/EventInterface.php). [Example](/example/Event/SuccessUserRegistrationEvent.php).
2. create event handler class. [Example](/example/Event/SuccessUserRegistrationHandler.php).
3. call trigger event at the right place ```Event::trigger(new Event())```.
4. subscribe to the event before executing it ```Event::listen(SomeClass::class, static function ($event) {})```.

#### second case
1. use [trait](/src/EventTrait.php) in your class.
2. record all events via ```EventTrait::recordEvent```.
3. call in the right place: ```EventBus::dispatch()```.
4. pass  ```EventTrait::releaseEvents``` result to the "dispatch" function parameter.