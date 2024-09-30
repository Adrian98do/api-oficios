<?php

namespace App\Domain\Entity;

class User
{
    private string $id;
    private string $name;
    private string $lastname;
    private string $email;
    private string $password;
    private ?string $companyId;

    public function __construct(string $id, string $name, string $lastname, string $email, string $password, ?string $companyId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->companyId = $companyId;
    }

    // Getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    // Setters
    public function setCompanyId(?string $companyId): void
    {
        $this->companyId = $companyId;
    }
}
?>