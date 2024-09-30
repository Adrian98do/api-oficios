<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Entity\Company;
use App\Domain\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineCompanyRepository implements CompanyRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findById(string $id): ?Company
    {
        return $this->entityManager->find(Company::class, $id);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Company::class)->findAll();
    }

    public function save(Company $company): void
    {
        $this->entityManager->persist($company);
        $this->entityManager->flush();
    }

    public function remove(Company $company): void
    {
        $this->entityManager->remove($company);
        $this->entityManager->flush();
    }
}
?>