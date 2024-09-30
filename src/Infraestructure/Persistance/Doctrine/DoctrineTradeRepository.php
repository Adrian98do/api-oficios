<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Entity\Trade;
use App\Domain\Repository\TradeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineTradeRepository implements TradeRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findById(string $id): ?Trade
    {
        return $this->entityManager->find(Trade::class, $id);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Trade::class)->findAll();
    }

    public function save(Trade $trade): void
    {
        $this->entityManager->persist($trade);
        $this->entityManager->flush();
    }

    public function remove(Trade $trade): void
    {
        $this->entityManager->remove($trade);
        $this->entityManager->flush();
    }
}
?>