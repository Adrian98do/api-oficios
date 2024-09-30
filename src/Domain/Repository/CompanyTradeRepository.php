<?php

namespace App\Domain\Repository;

use App\Domain\Entity\CompanyTrade;

interface CompanyTradeRepository
{
    public function findById(string $companyId, string $tradeId): ?CompanyTrade;
    public function findAll(): array;
    public function save(CompanyTrade $companyTrade): void;
    public function remove(CompanyTrade $companyTrade): void;
}
?>