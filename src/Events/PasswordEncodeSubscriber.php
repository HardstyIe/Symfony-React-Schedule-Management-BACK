<?php

namespace App\Events;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordEncodeSubscriber implements EventSubscriberInterface
{
  private $encoder;

  public function __construct(UserPasswordHasherInterface $encoder)
  {
    $this->encoder = $encoder;
  }

  public static function getSubscribedEvents()
  {
    return [
      KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE]
    ];
  }

  public function encodePassword(ViewEvent $event)
  {
    $result = $event->getControllerResult();
    $method = $event->getRequest()->getMethod();
    if (
      $result instanceof User &&
      ($method == "POST" ||
        ($method == "PUT" && !str_starts_with($result->getPassword(), "$2y$")) ||
        ($method == "PATCH" && json_decode($event->getRequest()->getContent())->password)
      )
    ) {
      $hash = $this->encoder->hashPassword($result, $result->getPassword());
      var_dump($hash);
      $result->setPassword($hash);
    }
  }
}
