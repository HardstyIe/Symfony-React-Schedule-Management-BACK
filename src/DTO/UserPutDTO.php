<?php

namespace DTO;

class UserPutDTO
{
  public ?string $email = null;
  public ?string $password = null;
  public ?string $firstName = null;
  public ?string $lastName = null;
  public ?\DateTimeInterface $birthday = null;
  public ?string $phone = null;
}
