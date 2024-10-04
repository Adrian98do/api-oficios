<?php

namespace App\Domain\ValueObject;

class Cif
{
    private string $value;

    public function __construct(string $value)
    {
        // Puedes añadir aquí cualquier lógica de validación para el CIF
        if (!$this->isValidCif($value)) {
            throw new \InvalidArgumentException("CIF no es válido");
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

    private function isValidCif(string $value): bool
    {
        // Añade aquí la lógica para validar el CIF
        return strlen($value) === 9; // Ejemplo simple
    }
}