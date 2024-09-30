<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Trade;

interface TradeRepository
{
    public function findById(string $id): ?Trade;
    public function findAll(): array;
    public function save(Trade $trade): void;
    public function remove(Trade $trade): void;
}
?>