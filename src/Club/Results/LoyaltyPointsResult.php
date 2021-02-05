<?php

namespace SnappMarket\Club\Results;

class LoyaltyPointsResult
{
    private $points;



    public function __construct(int $points)
    {
        $this->points = $points;
    }



    public function getPoints(): int
    {
        return $this->points;
    }


}
