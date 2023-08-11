<?php

namespace App\Entity;

use App\Repository\PlaningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaningRepository::class)]
class Planing
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date_start = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date_end = null;

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
}