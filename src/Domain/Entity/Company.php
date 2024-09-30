<?php

namespace App\Domain\Entity;

class Company
{
    private string $id;
    private string $name;
    private string $cif;
    private string $address;
    private int $phoneNumber;
    private int $contactUser;

    public function __construct(string $id, string $name, string $cif, string $address, int $phoneNumber, int $contactUser)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cif = $cif;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->contactUser = $contactUser;
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

    public function getCif(): string
    {
        return $this->cif;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function getContactUser(): int
    {
        return $this->contactUser;
    }

    // Setters (si son necesarios)
    public function setContactUser(int $contactUser): void
    {
        $this->contactUser = $contactUser;
    }
}
?>