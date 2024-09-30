<?php

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
class Company
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36, unique: true)]
    private string $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $cif;

    #[ORM\Column(type: 'string', length: 255)]
    private string $address;

    #[ORM\Column(type: 'integer')]
    private int $phoneNumber;

    public function __construct(string $name, string $cif, string $address, int $phoneNumber)
    {
        // Generar UUID usando Symfony\Component\Uid\Uuid
        $this->id = Uuid::v4()->toRfc4122();
        $this->name = $name;
        $this->cif = $cif;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
    }

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
}