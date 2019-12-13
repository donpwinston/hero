<?php

namespace Drupal\hero\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class HeroInitSubscriber implements EventSubscriberInterface
{
  public function __construct()
  { }

  public static function getSubscribedEvents()
  {
    $events[KernelEvents::REQUEST][] = ['onRequest'];
    return $events;
  }

  public function onRequest($event)
  {
    var_dump('Hello from our event');
  }
}
