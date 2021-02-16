<?php

namespace SnappMarket\Club\Results;

class LoyaltyProfileResult
{
    private $userId;

    private $isLoyal;

    private $points;

    private $jwtToken;



    public function __construct(int $userId, bool $isLoyal, int $points, ?string $jwtToken)
    {
        $this->userId   = $userId;
        $this->isLoyal  = $isLoyal;
        $this->points   = $points;
        $this->jwtToken = $jwtToken;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }



    public function isLoyal(): bool
    {
        return $this->isLoyal;
    }



    public function getPoints(): int
    {
        return $this->points;
    }



    public function getJwtToken(): ?string
    {
        return $this->jwtToken;
    }
}
