<?php

namespace App\Application\Query;

use App\Domain\Repository\CompanyRepository;

class GetAllCompaniesQuery
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function execute(): array
    {
        // Devuelve un array de todas las empresas (Company)
        return $this->companyRepository->findAll();
    }
}
?>