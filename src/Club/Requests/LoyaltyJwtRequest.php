<?php

namespace SnappMarket\Club\Requests;

class LoyaltyJwtRequest
{
    private $userId;



    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }
}
