<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  #[ORM\Column(length: 10)]
  private ?string $scolarship_year = null;

  #[ORM\OneToMany(mappedBy: 'classeId', targetEntity: CourClasse::class)]
  private Collection $courClasses;

  #[ORM\OneToMany(mappedBy: 'classeId', targetEntity: PlanningClasse::class)]
  private Collection $planningClasses;

  #[ORM\OneToMany(mappedBy: 'classeId', targetEntity: NotificationClasse::class)]
  private Collection $notificationClasses;

  public function __construct()
  {
    $this->courClasses = new ArrayCollection();
    $this->planningClasses = new ArrayCollection();
    $this->notificationClasses = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): static
  {
    $this->name = $name;

    return $this;
  }

  public function getScolarshipYear(): ?string
  {
    return $this->scolarship_year;
  }

  public function setScolarshipYear(string $scolarship_year): static
  {
    $this->scolarship_year = $scolarship_year;

    return $this;
  }

  /**
   * @return Collection<int, CourClasse>
   */
  public function getCourClasses(): Collection
  {
    return $this->courClasses;
  }

  public function addCourClass(CourClasse $courClass): static
  {
    if (!$this->courClasses->contains($courClass)) {
      $this->courClasses->add($courClass);
      $courClass->setClasseId($this);
    }

    return $this;
  }

  public function removeCourClass(CourClasse $courClass): static
  {
    if ($this->courClasses->removeElement($courClass)) {
      // set the owning side to null (unless already changed)
      if ($courClass->getClasseId() === $this) {
        $courClass->setClasseId(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, PlanningClasse>
   */
  public function getPlanningClasses(): Collection
  {
    return $this->planningClasses;
  }

  public function addPlanningClass(PlanningClasse $planningClass): static
  {
    if (!$this->planningClasses->contains($planningClass)) {
      $this->planningClasses->add($planningClass);
      $planningClass->setClasseId($this);
    }

    return $this;
  }

  public function removePlanningClass(PlanningClasse $planningClass): static
  {
    if ($this->planningClasses->removeElement($planningClass)) {
      // set the owning side to null (unless already changed)
      if ($planningClass->getClasseId() === $this) {
        $planningClass->setClasseId(null);
      }
    }

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
      $notificationClass->setClasseId($this);
    }

    return $this;
  }

  public function removeNotificationClass(NotificationClasse $notificationClass): static
  {
    if ($this->notificationClasses->removeElement($notificationClass)) {
      // set the owning side to null (unless already changed)
      if ($notificationClass->getClasseId() === $this) {
        $notificationClass->setClasseId(null);
      }
    }

    return $this;
  }
}