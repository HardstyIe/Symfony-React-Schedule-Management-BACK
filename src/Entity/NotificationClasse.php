<?php

namespace App\Entity;

use App\Repository\NotificationClasseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationClasseRepository::class)]
class NotificationClasse
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(inversedBy: 'notificationClasses')]
  private ?Notification $notificationId = null;

  #[ORM\ManyToOne(inversedBy: 'notificationClasses')]
  private ?Classe $classeId = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNotificationId(): ?Notification
  {
    return $this->notificationId;
  }

  public function setNotificationId(?Notification $notificationId): static
  {
    $this->notificationId = $notificationId;

    return $this;
  }

  public function getClasseId(): ?Classe
  {
    return $this->classeId;
  }

  public function setClasseId(?Classe $classeId): static
  {
    $this->classeId = $classeId;

    return $this;
  }
}