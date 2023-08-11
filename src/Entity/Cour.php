<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourRepository::class)]
#[ApiResource]
class Cour
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date_start = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date_end = null;

  #[ORM\Column(type: Types::TEXT)]
  private ?string $description = null;

  #[ORM\OneToMany(mappedBy: 'courId', targetEntity: CourTeacher::class)]
  private Collection $courTeachers;

  #[ORM\OneToMany(mappedBy: 'courId', targetEntity: CourClasse::class)]
  private Collection $courClasses;

  #[ORM\OneToMany(mappedBy: 'courId', targetEntity: PlanningCour::class)]
  private Collection $planningCours;

  public function __construct()
  {
    $this->courTeachers = new ArrayCollection();
    $this->courClasses = new ArrayCollection();
    $this->planningCours = new ArrayCollection();
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

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(string $description): static
  {
    $this->description = $description;

    return $this;
  }

  /**
   * @return Collection<int, CourTeacher>
   */
  public function getCourTeachers(): Collection
  {
    return $this->courTeachers;
  }

  public function addCourTeacher(CourTeacher $courTeacher): static
  {
    if (!$this->courTeachers->contains($courTeacher)) {
      $this->courTeachers->add($courTeacher);
      $courTeacher->setCourId($this);
    }

    return $this;
  }

  public function removeCourTeacher(CourTeacher $courTeacher): static
  {
    if ($this->courTeachers->removeElement($courTeacher)) {
      // set the owning side to null (unless already changed)
      if ($courTeacher->getCourId() === $this) {
        $courTeacher->setCourId(null);
      }
    }

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
      $courClass->setCourId($this);
    }

    return $this;
  }

  public function removeCourClass(CourClasse $courClass): static
  {
    if ($this->courClasses->removeElement($courClass)) {
      // set the owning side to null (unless already changed)
      if ($courClass->getCourId() === $this) {
        $courClass->setCourId(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, PlanningCour>
   */
  public function getPlanningCours(): Collection
  {
    return $this->planningCours;
  }

  public function addPlanningCour(PlanningCour $planningCour): static
  {
    if (!$this->planningCours->contains($planningCour)) {
      $this->planningCours->add($planningCour);
      $planningCour->setCourId($this);
    }

    return $this;
  }

  public function removePlanningCour(PlanningCour $planningCour): static
  {
    if ($this->planningCours->removeElement($planningCour)) {
      // set the owning side to null (unless already changed)
      if ($planningCour->getCourId() === $this) {
        $planningCour->setCourId(null);
      }
    }

    return $this;
  }
}