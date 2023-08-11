<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $action = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $date = null;

  #[ORM\Column(length: 45)]
  private ?string $ip_adress = null;

  #[ORM\Column(length: 255)]
  private ?string $device_name = null;

  #[ORM\OneToMany(mappedBy: 'logId', targetEntity: LogUser::class)]
  private Collection $logUsers;

  public function __construct()
  {
    $this->logUsers = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getAction(): ?string
  {
    return $this->action;
  }

  public function setAction(string $action): static
  {
    $this->action = $action;

    return $this;
  }

  public function getDate(): ?\DateTimeInterface
  {
    return $this->date;
  }

  public function setDate(\DateTimeInterface $date): static
  {
    $this->date = $date;

    return $this;
  }

  public function getIpAdress(): ?string
  {
    return $this->ip_adress;
  }

  public function setIpAdress(string $ip_adress): static
  {
    $this->ip_adress = $ip_adress;

    return $this;
  }

  public function getDeviceName(): ?string
  {
    return $this->device_name;
  }

  public function setDeviceName(string $device_name): static
  {
    $this->device_name = $device_name;

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
      $logUser->setLogId($this);
    }

    return $this;
  }

  public function removeLogUser(LogUser $logUser): static
  {
    if ($this->logUsers->removeElement($logUser)) {
      // set the owning side to null (unless already changed)
      if ($logUser->getLogId() === $this) {
        $logUser->setLogId(null);
      }
    }

    return $this;
  }
}