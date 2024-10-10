<?php

namespace App\Tests\Integration\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Domain\Entity\User;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\CompanyId;
use Doctrine\ORM\EntityManagerInterface;

class UserRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCanSaveAndRetrieveUser(): void
    {
        // Creamos un CompanyId (como Value Object) en lugar de pasar el objeto Company completo
        $companyId = new CompanyId('12345678-A');

        // Crear un objeto User con firstname, lastname, email, y el CompanyId embebido
        $user = new User('John', 'Doe', new Email('john@example.com'), $companyId);

        // Persistimos el objeto User
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Recuperamos el User guardado por su email
        $savedUser = $this->entityManager->getRepository(User::class)
            ->findOneBy(['email.value' => 'john@example.com']);

        // Verificamos que los datos sean correctos
        $this->assertSame('John', $savedUser->getFirstName());
        $this->assertSame('Doe', $savedUser->getLastName());
        $this->assertSame('john@example.com', $savedUser->getEmail()->getValue());
        $this->assertSame('12345678-A', $savedUser->getCompanyId()->getValue());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null; // Evita problemas de memoria
    }
}