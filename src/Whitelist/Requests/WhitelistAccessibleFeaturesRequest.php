<?php

namespace SnappMarket\Whitelist\Requests;

class WhitelistAccessibleFeaturesRequest
{
    protected $users = [];
    protected $platforms = [];

    public function pushUsers(...$users)
    {
        if (empty($users)) {
            return;
        }

        array_push($this->users, ...$users);
    }

    public function pushPlatforms(...$platforms)
    {
        if (empty($platforms)) {
            return;
        }

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
