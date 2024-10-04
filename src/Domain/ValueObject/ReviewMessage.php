<?php

namespace App\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class ReviewMessage
{
    private string $value;

    public function __construct(string $value)
    {
        if (strlen($value) < 10) {
            throw new \InvalidArgumentException("El mensaje de la reseña debe tener al menos 10 caracteres.");
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
}