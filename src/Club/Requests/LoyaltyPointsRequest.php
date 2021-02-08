<?php

namespace SnappMarket\Club\Requests;

class LoyaltyPointsRequest
{
    private $userId;



    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }



    public function getUserId(): string
    {
        return $this->userId;
    }


}
