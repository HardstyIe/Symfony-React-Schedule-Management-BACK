<?php

namespace App\Entity;

use App\Repository\PlanningClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningClasseRepository::class)]
class PlanningClasse
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'planningClasses')]
  private ?self $planningId = null;

  #[ORM\OneToMany(mappedBy: 'planningId', targetEntity: self::class)]
  private Collection $planningClasses;

  #[ORM\ManyToOne(inversedBy: 'planningClasses')]
  private ?Classe $classeId = null;

  public function __construct()
  {
    $this->planningClasses = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getPlanningId(): ?self
  {
    return $this->planningId;
  }

  public function setPlanningId(?self $planningId): static
  {
    $this->planningId = $planningId;

    return $this;
  }

  /**
   * @return Collection<int, self>
   */
  public function getPlanningClasses(): Collection
  {
    return $this->planningClasses;
  }

  public function addPlanningClass(self $planningClass): static
  {
    if (!$this->planningClasses->contains($planningClass)) {
      $this->planningClasses->add($planningClass);
      $planningClass->setPlanningId($this);
    }

    return $this;
  }

  public function removePlanningClass(self $planningClass): static
  {
    if ($this->planningClasses->removeElement($planningClass)) {
      // set the owning side to null (unless already changed)
      if ($planningClass->getPlanningId() === $this) {
        $planningClass->setPlanningId(null);
      }
    }

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