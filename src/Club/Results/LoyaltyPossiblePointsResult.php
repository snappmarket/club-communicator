<?php

namespace SnappMarket\Club\Results;

class LoyaltyPossiblePointsResult
{
    private $userId;

    private $value;

    private $points;



    public function __construct(int $userId, int $value, int $points)
    {
        $this->userId = $userId;
        $this->value  = $value;
        $this->points = $points;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }



    public function getValue(): int
    {
        return $this->value;
    }



    public function getPoints(): int
    {
        return $this->points;
    }
}
