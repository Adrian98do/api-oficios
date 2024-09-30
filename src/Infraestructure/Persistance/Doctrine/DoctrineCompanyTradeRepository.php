<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Entity\CompanyTrade;
use App\Domain\Repository\CompanyTradeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineCompanyTradeRepository implements CompanyTradeRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findById(string $companyId, string $tradeId): ?CompanyTrade
    {
        return $this->entityManager->find(CompanyTrade::class, ['companyId' => $companyId, 'tradeId' => $tradeId]);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(CompanyTrade::class)->findAll();
    }

    public function save(CompanyTrade $companyTrade): void
    {
        $this->entityManager->persist($companyTrade);
        $this->entityManager->flush();
    }

    public function remove(CompanyTrade $companyTrade): void
    {
        $this->entityManager->remove($companyTrade);
        $this->entityManager->flush();
    }
}
?>