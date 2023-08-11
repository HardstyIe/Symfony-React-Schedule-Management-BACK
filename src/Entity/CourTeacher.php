<?php

namespace App\Entity;

use App\Repository\CourTeacherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourTeacherRepository::class)]
class CourTeacher
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\ManyToOne(inversedBy: 'courTeachers')]
  private ?User $teacherId = null;

  #[ORM\ManyToOne(inversedBy: 'courTeachers')]
  private ?Cour $courId = null;

  public function getId(): ?int
  {
    return $this->id;
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

  public function getCourId(): ?Cour
  {
    return $this->courId;
  }

  public function setCourId(?Cour $courId): static
  {
    $this->courId = $courId;

    return $this;
  }
}