<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Company;

interface CompanyRepository
{
    public function findById(string $id): ?Company;
    public function save(Company $company): void;
    public function remove(Company $company): void;
    public function findAll(): array;
}
?>