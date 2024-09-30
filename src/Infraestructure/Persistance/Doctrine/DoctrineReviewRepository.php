<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Entity\Review;
use App\Domain\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineReviewRepository implements ReviewRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findById(string $id): ?Review
    {
        return $this->entityManager->find(Review::class, $id);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Review::class)->findAll();
    }

    public function save(Review $review): void
    {
        $this->entityManager->persist($review);
        $this->entityManager->flush();
    }

    public function remove(Review $review): void
    {
        $this->entityManager->remove($review);
        $this->entityManager->flush();
    }
}
?>