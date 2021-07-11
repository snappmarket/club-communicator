<?php

namespace SnappMarket\Whitelist\Results;

use DateTime;

class WhitelistAccessibleFeaturesResult
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getAccessibleFeatures() : array
    {
        return $this->data;
    }

    public function hasAccessTo(string $feature) : bool
    {
        return in_array($feature, $this->data);
    }
}
