<?php

namespace SnappMarket\Club\Requests;

class LoyaltyPossiblePointsRequest
{
    private $userId;

    private $value;



    public function __construct(int $userId, int $value)
    {
        $this->userId = $userId;
        $this->value  = $value;
    }



    public function getUserId(): string
    {
        return $this->userId;
    }



    public function getValue(): int
    {
        return $this->value;
    }
}
