<?php

namespace App\Tests\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\ReviewMessage;

class ReviewMessageTest extends TestCase
{
    public function testValidReviewMessage(): void
    {
        $message = new ReviewMessage('Este es un mensaje de reseña válido.');
        $this->assertEquals('Este es un mensaje de reseña válido.', $message->getValue());
    }

    public function testTooShortReviewMessage(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new ReviewMessage('Muy corto'); // Demasiado corto, debería lanzar excepción
    }
}