<?php

namespace App\Tests\Integration\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Domain\Entity\Company;
use App\Domain\ValueObject\Cif;
use Doctrine\ORM\EntityManagerInterface;

class CompanyRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCanSaveAndRetrieveCompany(): void
    {
        // Creamos una nueva compañía
        $company = new Company('Test Company', new Cif('A12345678'), 'Address Test', 123456789);

        // Guardamos la entidad
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        // Recuperamos la entidad guardada
        $savedCompany = $this->entityManager->getRepository(Company::class)
            ->findOneBy(['name' => 'Test Company']);

        $this->assertSame('Test Company', $savedCompany->getName());
        $this->assertSame('A12345678', $savedCompany->getCif()->getValue());
    }

    public function testCanUpdateCompany(): void
    {
        // Creamos y guardamos una compañía
        $company = new Company('Company to Update', new Cif('B98765432'), 'Old Address', 123456789);
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        // Actualizamos la dirección de la compañía
        $company->setAddress('New Address');
        $this->entityManager->flush();

        // Recuperamos la entidad actualizada
        $updatedCompany = $this->entityManager->getRepository(Company::class)
            ->findOneBy(['cif.value' => 'B98765432']);

        $this->assertSame('New Address', $updatedCompany->getAddress());
    }

    public function testCanDeleteCompany(): void
    {
        // Creamos y guardamos una compañía
        $company = new Company('Company to Delete', new Cif('C12345678'), 'Delete Address', 123456789);
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        // Eliminamos la compañía
        $this->entityManager->remove($company);
        $this->entityManager->flush();

        // Intentamos recuperar la compañía eliminada
        $deletedCompany = $this->entityManager->getRepository(Company::class)
            ->findOneBy(['cif.value' => 'C12345678']);

        $this->assertNull($deletedCompany);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null; // Evita problemas de memoria
    }
}