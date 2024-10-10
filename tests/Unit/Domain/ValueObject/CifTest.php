<?php

namespace App\Tests\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Cif;
    
class CifTest extends TestCase
{
    public function testValidCif(): void
    {
        $cif = new Cif('A12345678');
        $this->assertEquals('A12345678', $cif->getValue());
    }

    public function testInvalidCifLength(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cif('A1234'); // CIF demasiado corto
    }

    public function testInvalidCifCharacters(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cif('123456789'); // Sin prefijo de letra, debería lanzar excepción
    }
}