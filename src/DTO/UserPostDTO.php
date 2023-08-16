<?php

namespace DTO;

class UserPostDTO
{
  public ?string $email = null;
  public ?string $password = null;
  public ?string $firstName = null;
  public ?string $lastName = null;
  public ?\DateTimeInterface $birthday = null;
  public ?string $phone = null;
}
