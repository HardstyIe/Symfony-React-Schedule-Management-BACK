<?php

namespace App\Entity;

use App\Repository\PlanningCourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningCourRepository::class)]
class PlanningCour
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'planningCours')]
  private ?self $planningId = null;

  #[ORM\OneToMany(mappedBy: 'planningId', targetEntity: self::class)]
  private Collection $planningCours;

  #[ORM\ManyToOne(inversedBy: 'planningCours')]
  private ?Cour $courId = null;

  #[ORM\OneToMany(mappedBy: 'planningId', targetEntity: PlanningTeacher::class)]
  private Collection $planningTeachers;

  public function __construct()
  {
    $this->planningCours = new ArrayCollection();
    $this->planningTeachers = new ArrayCollection();
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
  public function getPlanningCours(): Collection
  {
    return $this->planningCours;
  }

  public function addPlanningCour(self $planningCour): static
  {
    if (!$this->planningCours->contains($planningCour)) {
      $this->planningCours->add($planningCour);
      $planningCour->setPlanningId($this);
    }

    return $this;
  }

  public function removePlanningCour(self $planningCour): static
  {
    if ($this->planningCours->removeElement($planningCour)) {
      // set the owning side to null (unless already changed)
      if ($planningCour->getPlanningId() === $this) {
        $planningCour->setPlanningId(null);
      }
    }

    return $this;
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

  /**
   * @return Collection<int, PlanningTeacher>
   */
  public function getPlanningTeachers(): Collection
  {
    return $this->planningTeachers;
  }

  public function addPlanningTeacher(PlanningTeacher $planningTeacher): static
  {
    if (!$this->planningTeachers->contains($planningTeacher)) {
      $this->planningTeachers->add($planningTeacher);
      $planningTeacher->setPlanningId($this);
    }

    return $this;
  }

  public function removePlanningTeacher(PlanningTeacher $planningTeacher): static
  {
    if ($this->planningTeachers->removeElement($planningTeacher)) {
      // set the owning side to null (unless already changed)
      if ($planningTeacher->getPlanningId() === $this) {
        $planningTeacher->setPlanningId(null);
      }
    }

    return $this;
  }
}