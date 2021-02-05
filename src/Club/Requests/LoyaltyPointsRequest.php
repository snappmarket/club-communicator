<?php

namespace SnappMarket\Club\Requests;

class LoyaltyPointsRequest
{
    private $jwtToken;



    public function __construct(string $jwtToken)
    {
        $this->jwtToken = $jwtToken;
    }



    public function getJwtToken(): string
    {
        return $this->jwtToken;
    }


}
