<?php

namespace SnappMarket\Club\Results;

use DateTime;

class LoyaltyJwtResult
{
    private $userId;

    private $token;

    private $expiresAt;



    public function __construct(
        int $userId,
        string $token,
        DateTime $expiresAt
    ) {
        $this->userId    = $userId;
        $this->token     = $token;
        $this->expiresAt = $expiresAt;
    }



    public function getUserId(): int
    {
        return $this->userId;
    }



    public function getToken(): string
    {
        return $this->token;
    }



    public function getExpiresAt(): DateTime
    {
        return $this->expiresAt;
    }

}
