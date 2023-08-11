<?php

namespace App\Entity;

use App\Repository\AbsenceUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbsenceUserRepository::class)]
class AbsenceUser
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(inversedBy: 'absenceUsers')]
  private ?Absence $absenceId = null;

  #[ORM\ManyToOne(inversedBy: 'absenceUsers')]
  private ?User $userId = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getAbsenceId(): ?Absence
  {
    return $this->absenceId;
  }

  public function setAbsenceId(?Absence $absenceId): static
  {
    $this->absenceId = $absenceId;

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