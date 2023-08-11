<?php

namespace App\Entity;

use App\Repository\LogUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogUserRepository::class)]
class LogUser
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(inversedBy: 'logUsers')]
  private ?Log $logId = null;

  #[ORM\ManyToOne(inversedBy: 'logUsers')]
  private ?User $userId = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getLogId(): ?Log
  {
    return $this->logId;
  }

  public function setLogId(?Log $logId): static
  {
    $this->logId = $logId;

    return $this;
  }

  public function getUserId(): ?User
  {
    return $this->userId;
  }

  public function setUserId(?User $userId): static
  {
    $this->userId = $userId;

    return $this;
  }
}