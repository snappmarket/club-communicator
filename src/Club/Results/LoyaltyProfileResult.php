<?php

namespace SnappMarket\Club\Results;

class LoyaltyProfileResult
{
    private $userId;

    private $isLoyal;

    private $points;



    public function __construct(int $userId, bool $isLoyal, int $points)
    {
        $this->userId  = $userId;
        $this->isLoyal = $isLoyal;
        $this->points  = $points;
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
}
