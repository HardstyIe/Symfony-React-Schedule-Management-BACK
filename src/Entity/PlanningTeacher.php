<?php

namespace App\Entity;

use App\Repository\PlanningTeacherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningTeacherRepository::class)]
class PlanningTeacher
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(inversedBy: 'planningTeachers')]
  private ?PlanningCour $planningId = null;

  #[ORM\ManyToOne(inversedBy: 'planningTeachers')]
  private ?User $teacherId = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getPlanningId(): ?PlanningCour
  {
    return $this->planningId;
  }

  public function setPlanningId(?PlanningCour $planningId): static
  {
    $this->planningId = $planningId;

    return $this;
  }

  public function getTeacherId(): ?User
  {
    return $this->teacherId;
  }

  public function setTeacherId(?User $teacherId): static
  {
    $this->teacherId = $teacherId;

    return $this;
  }
}