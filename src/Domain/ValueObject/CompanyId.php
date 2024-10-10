<?php

namespace App\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

#[ORM\Embeddable]
class CompanyId
{
    #[ORM\Column(type: 'string')]
    private string $id;

    public function __construct(string $id)
    {
        // Validación básica
        if (!preg_match('/^[A-Za-z0-9-]+$/', $id)) {
            throw new InvalidArgumentException("El ID de la compañía no es válido.");
        }

        $this->id = $id;
    }

    public function getValue(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}