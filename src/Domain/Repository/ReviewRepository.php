<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Review;

interface ReviewRepository
{
    public function findById(string $id): ?Review;
    public function findAll(): array;
    public function save(Review $review): void;
    public function remove(Review $review): void;
}
?>