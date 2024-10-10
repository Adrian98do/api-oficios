<?php

namespace App\Tests\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Email;

class EmailTest extends TestCase
{
    public function testValidEmail(): void
    {
        $email = new Email('example@email.com');
        $this->assertEquals('example@email.com', $email->getValue());
    }

    public function testInvalidEmail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('not-an-email'); // No es un email válido, debería lanzar excepción
    }
}