<?php

namespace App\Domain\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Domain\ValueObject\CompanyId;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\ValueObject\Email;

#[ORM\Entity]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $lastname;

    #[ORM\Embedded(class: Email::class)]
    private Email $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\Embedded(class: CompanyId::class)]
    private ?CompanyId $companyId = null;

    public function __construct(string $name, string $lastname, Email $email, string $password, ?CompanyId $companyId = null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->companyId = $companyId;
    }

    // Getters y Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getCompanyId(): ?CompanyId
    {
        return $this->companyId;
    }

    public function setCompanyId(?CompanyId $companyId): void
    {
        $this->companyId = $companyId;
    }
}