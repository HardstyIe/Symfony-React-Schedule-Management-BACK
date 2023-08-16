<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Absence;
use App\Entity\AbsenceUser;
use App\Entity\CourTeacher;
use App\Entity\LogUser;
use App\Entity\PlanningTeacher;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
  normalizationContext: ['groups' => ['user_read']],
  denormalizationContext: ['groups' => ['user_write']],
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  #[Groups(['user_read'])]
  private ?int $id = null;

  #[ORM\Column(length: 180, unique: true)]
  #[Assert\Email]
  #[Groups(['user_read', 'user_write'])]
  private ?string $email = null;

  #[ORM\Column]
  #[Groups(['user_read'])]

  private array $roles = [];

  /**
   * @var string The hashed password
   */
  #[ORM\Column]
  #[Assert\Length(min: 8)]
  #[Groups(['user_write'])]
  private ?string $password = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank]
  #[Assert\Length(min: 1, max: 255)]
  #[Groups(['user_read', 'user_write'])]
  private ?string $firstName = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank]
  #[Assert\Length(min: 1, max: 255)]
  #[Groups(['user_read', 'user_write'])]
  private ?string $lastName = null;

  #[ORM\Column(type: Types::DATE_MUTABLE)]
  #[Assert\NotBlank]
  #[Groups(['user_read', 'user_write'])]
  private ?\DateTimeInterface $birthday = null;

  #[ORM\Column(length: 15)]
  #[Assert\Length(min: 10, max: 15)]
  #[Assert\Regex(pattern: "/^\+?[0-9 ]+$/")]
  #[Groups(['user_read', 'user_write'])]
  private ?string $phone = null;

  #[ORM\OneToMany(mappedBy: 'teacherId', targetEntity: CourTeacher::class)]
  private Collection $courTeachers;

  #[ORM\OneToMany(mappedBy: 'userId', targetEntity: Absence::class)]
  private Collection $absences;

  #[ORM\OneToMany(mappedBy: 'userId', targetEntity: AbsenceUser::class)]
  private Collection $absenceUsers;

  #[ORM\OneToMany(mappedBy: 'teacherId', targetEntity: PlanningTeacher::class)]
  private Collection $planningTeachers;

  #[ORM\OneToMany(mappedBy: 'userId', targetEntity: LogUser::class)]
  private Collection $logUsers;




  public function __construct()
  {
    $this->courTeachers = new ArrayCollection();
    $this->absences = new ArrayCollection();
    $this->absenceUsers = new ArrayCollection();
    $this->planningTeachers = new ArrayCollection();
    $this->logUsers = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): static
  {
    $this->email = $email;

    return $this;
  }

  /**
   * A visual identifier that represents this user.
   *
   * @see UserInterface
   */
  public function getUserIdentifier(): string
  {
    return (string) $this->email;
  }

  /**
   * @see UserInterface
   */
  public function getRoles(): array
  {
    $roles = $this->roles;
    // guarantee every user at least has ROLE_USER
    $roles[] = 'ROLE_USER';

    return array_unique($roles);
  }

  public function setRoles(array $roles): static
  {
    $this->roles = $roles;

    return $this;
  }

  /**
   * @see PasswordAuthenticatedUserInterface
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): static
  {
    $this->password = $password;

    return $this;
  }

  /**
   * @see UserInterface
   */
  public function eraseCredentials(): void
  {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }

  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  public function setFirstName(string $firstName): static
  {
    $this->firstName = $firstName;

    return $this;
  }

  public function getLastName(): ?string
  {
    return $this->lastName;
  }

  public function setLastName(string $lastName): static
  {
    $this->lastName = $lastName;

    return $this;
  }

  public function getBirthday(): ?\DateTimeInterface
  {
    return $this->birthday;
  }

  public function setBirthday(?\DateTimeInterface $birthday): self
  {
    $this->birthday = $birthday;

    return $this;
  }

  public function getPhone(): ?string
  {
    return $this->phone;
  }

  public function setPhone(string $phone): static
  {
    $this->phone = $phone;

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
      $courTeacher->setTeacherId($this);
    }

    return $this;
  }

  public function removeCourTeacher(CourTeacher $courTeacher): static
  {
    if ($this->courTeachers->removeElement($courTeacher)) {
      // set the owning side to null (unless already changed)
      if ($courTeacher->getTeacherId() === $this) {
        $courTeacher->setTeacherId(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, Absence>
   */
  public function getAbsences(): Collection
  {
    return $this->absences;
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
      $absenceUser->setUserId($this);
    }

    return $this;
  }

  public function removeAbsenceUser(AbsenceUser $absenceUser): static
  {
    if ($this->absenceUsers->removeElement($absenceUser)) {
      // set the owning side to null (unless already changed)
      if ($absenceUser->getUserId() === $this) {
        $absenceUser->setUserId(null);
      }
    }

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
      $planningTeacher->setTeacherId($this);
    }

    return $this;
  }

  public function removePlanningTeacher(PlanningTeacher $planningTeacher): static
  {
    if ($this->planningTeachers->removeElement($planningTeacher)) {
      // set the owning side to null (unless already changed)
      if ($planningTeacher->getTeacherId() === $this) {
        $planningTeacher->setTeacherId(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, LogUser>
   */
  public function getLogUsers(): Collection
  {
    return $this->logUsers;
  }

  public function addLogUser(LogUser $logUser): static
  {
    if (!$this->logUsers->contains($logUser)) {
      $this->logUsers->add($logUser);
      $logUser->setUserId($this);
    }

    return $this;
  }

  public function removeLogUser(LogUser $logUser): static
  {
    if ($this->logUsers->removeElement($logUser)) {
      // set the owning side to null (unless already changed)
      if ($logUser->getUserId() === $this) {
        $logUser->setUserId(null);
      }
    }

    return $this;
  }
}
