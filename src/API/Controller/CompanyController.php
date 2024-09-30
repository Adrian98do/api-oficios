<?php

namespace App\API\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Application\Query\GetAllCompaniesQuery;

class CompanyController extends AbstractController
{
    private GetAllCompaniesQuery $getAllCompaniesQuery;

    public function __construct(GetAllCompaniesQuery $getAllCompaniesQuery)
    {
        $this->getAllCompaniesQuery = $getAllCompaniesQuery;
    }

    #[Route('/api/companies', methods: ['GET'])] // Definición de ruta usando atributos PHP 8
    public function getAll(): JsonResponse
    {
        $companies = $this->getAllCompaniesQuery->execute();
        return $this->json($companies);
    }
}