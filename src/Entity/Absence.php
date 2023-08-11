<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbsenceRepository::class)]
class Absence
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date_start = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date_end = null;

  #[ORM\Column(length: 15)]
  private ?string $type = null;

  #[ORM\Column]
  private ?bool $isJustified = null;

  #[ORM\Column(length: 255)]
  private ?string $motif = null;

  #[ORM\OneToMany(mappedBy: 'absenceId', targetEntity: AbsenceUser::class)]
  private Collection $absenceUsers;

  public function __construct()
  {
    $this->absenceUsers = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDateStart(): ?\DateTimeInterface
  {
    return $this->date_start;
  }

  public function setDateStart(\DateTimeInterface $date_start): static
  {
    $this->date_start = $date_start;

    return $this;
  }

  public function getDateEnd(): ?\DateTimeInterface
  {
    return $this->date_end;
  }

  public function setDateEnd(\DateTimeInterface $date_end): static
  {
    $this->date_end = $date_end;

    return $this;
  }

  public function getType(): ?string
  {
    return $this->type;
  }

  public function setType(string $type): static
  {
    $this->type = $type;

    return $this;
  }

  public function isIsJustified(): ?bool
  {
    return $this->isJustified;
  }

  public function setIsJustified(bool $isJustified): static
  {
    $this->isJustified = $isJustified;

    return $this;
  }

  public function getMotif(): ?string
  {
    return $this->motif;
  }

  public function setMotif(string $motif): static
  {
    $this->motif = $motif;

    return $this;
  }

  /**
   * @return Collection<int, AbsenceUser>
   */
  public function getAbsenceUsers(): Collection
  {
    return $this->absenceUsers;
  }

  public function addAbsenceUser(AbsenceUser $absenceUser): static
  {
    if (!$this->absenceUsers->contains($absenceUser)) {
      $this->absenceUsers->add($absenceUser);
      $absenceUser->setAbsenceId($this);
    }

    return $this;
  }

  public function removeAbsenceUser(AbsenceUser $absenceUser): static
  {
    if ($this->absenceUsers->removeElement($absenceUser)) {
      // set the owning side to null (unless already changed)
      if ($absenceUser->getAbsenceId() === $this) {
        $absenceUser->setAbsenceId(null);
      }
    }

    return $this;
  }
}