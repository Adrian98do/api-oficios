<?php

namespace App\Domain\Entity;

class CompanyTrade
{
    private string $tradeId;
    private string $companyId;

    public function __construct(string $tradeId, string $companyId)
    {
        $this->tradeId = $tradeId;
        $this->companyId = $companyId;
    }

    // Getters
    public function getTradeId(): string
    {
        return $this->tradeId;
    }

    public function getCompanyId(): string
    {
        return $this->companyId;
    }
}
?>