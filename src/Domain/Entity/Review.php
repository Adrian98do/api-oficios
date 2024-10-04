<?php

namespace App\Domain\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\ValueObject\ReviewMessage;

#[ORM\Entity]
#[ApiResource]
class Review
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $rate;

    #[ORM\Embedded(class: ReviewMessage::class)]
    private ReviewMessage $message;

    #[ORM\Column(type: 'integer')]
    private int $userId;

    #[ORM\Column(type: 'integer')]
    private int $companyId;

    public function __construct(int $rate, ReviewMessage $message, int $userId, int $companyId)
    {
        $this->rate = $rate;
        $this->message = $message;
        $this->userId = $userId;
        $this->companyId = $companyId;
    }

    // Getters y Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getRate(): int
    {
        return $this->rate;
    }

    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }

    public function getMessage(): ReviewMessage
    {
        return $this->message;
    }

    public function setMessage(ReviewMessage $message): void
    {
        $this->message = $message;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }
}