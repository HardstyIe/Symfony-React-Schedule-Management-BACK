<?php

namespace App\Entity;

use App\Repository\CourClasseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourClasseRepository::class)]
class CourClasse
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(inversedBy: 'courClasses')]
  private ?Cour $courId = null;

  #[ORM\ManyToOne(inversedBy: 'courClasses')]
  private ?Classe $classeId = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getCourId(): ?Cour
  {
    return $this->courId;
  }

  public function setCourId(?Cour $courId): static
  {
    $this->courId = $courId;

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