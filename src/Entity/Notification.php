<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $message = null;

  #[ORM\Column]
  private ?\DateTimeImmutable $created_At = null;

  #[ORM\OneToMany(mappedBy: 'notificationId', targetEntity: NotificationClasse::class)]
  private Collection $notificationClasses;

  public function __construct()
  {
    $this->notificationClasses = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(string $message): static
  {
    $this->message = $message;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeImmutable
  {
    return $this->created_At;
  }

  public function setCreatedAt(\DateTimeImmutable $created_At): static
  {
    $this->created_At = $created_At;

    return $this;
  }

  /**
   * @return Collection<int, NotificationClasse>
   */
  public function getNotificationClasses(): Collection
  {
    return $this->notificationClasses;
  }

  public function addNotificationClass(NotificationClasse $notificationClass): static
  {
    if (!$this->notificationClasses->contains($notificationClass)) {
      $this->notificationClasses->add($notificationClass);
      $notificationClass->setNotificationId($this);
    }

    return $this;
  }

  public function removeNotificationClass(NotificationClasse $notificationClass): static
  {
    if ($this->notificationClasses->removeElement($notificationClass)) {
      // set the owning side to null (unless already changed)
      if ($notificationClass->getNotificationId() === $this) {
        $notificationClass->setNotificationId(null);
      }
    }

    return $this;
  }
}