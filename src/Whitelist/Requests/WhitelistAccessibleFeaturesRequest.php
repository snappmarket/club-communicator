<?php

namespace SnappMarket\Whitelist\Requests;

class WhitelistAccessibleFeaturesRequest
{
    protected $users = [];
    protected $platforms = [];

    public function pushUsers(...$users)
    {
        array_push($this->users, ...$users);
    }

    public function pushPlatforms(...$platforms)
    {
        array_push($this->platforms, ...$platforms);
    }

    public function getUsers() : array
    {
        return $this->users ?? [];
    }

    public function getPlatforms() : array
    {
        return $this->platforms ?? [];
    }

    public function toArray() : array
    {
        return [
            'platforms' => $this->getPlatforms(),
            'users' => $this->getUsers()
        ];
    }
}
