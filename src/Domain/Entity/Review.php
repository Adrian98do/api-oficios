<?php

namespace App\Domain\Entity;

class Review
{
    private string $id;
    private int $rate;
    private string $message;
    private string $userId;
    private string $companyId;

    public function __construct(string $id, int $rate, string $message, string $userId, string $companyId)
    {
        $this->id = $id;
        $this->rate = $rate;
        $this->message = $message;
        $this->userId = $userId;
        $this->companyId = $companyId;
    }

    // Getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getRate(): int
    {
        return $this->rate;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getCompanyId(): string
    {
        return $this->companyId;
    }
}
?>