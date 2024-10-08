<?php

namespace App\Domain\ValueObject;

use InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Cif
{
    #[ORM\Column(type: 'string', length: 9)]
    private string $value;

    public function __construct(string $value)
    {
        if (!$this->isValidCif($value)) {
            throw new InvalidArgumentException("El CIF proporcionado no es válido.");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    // Función para validar el CIF
    private function isValidCif(string $value): bool
    {
        // Validación de longitud (9 caracteres)
        if (strlen($value) !== 9) {
            return false;
        }

        // Validación de que el primer carácter sea una letra
        if (!ctype_alpha($value[0])) {
            return false;
        }
        
        return true;
    }
}