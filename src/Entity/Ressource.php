<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $name_fichier = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNameFichier(): ?string
  {
    return $this->name_fichier;
  }

  public function setNameFichier(string $name_fichier): static
  {
    $this->name_fichier = $name_fichier;

    return $this;
  }
}