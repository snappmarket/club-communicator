<?php

namespace SnappMarket\Club\Results;

class LoyaltyPointsResult
{
    private $userId;

    private $points;



    public function __construct(int $userId, int $points)
    {
        $this->userId = $userId;
        $this->points = $points;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }



    public function getPoints(): int
    {
        return $this->points;
    }


}
