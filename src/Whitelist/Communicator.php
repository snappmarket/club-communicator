<?php

namespace SnappMarket\Whitelist;

use Psr\Log\LoggerInterface;
use SnappMarket\Whitelist\Requests\WhitelistAccessibleFeaturesRequest;
use SnappMarket\Whitelist\Results\WhitelistAccessibleFeaturesResult;
use SnappMarket\Communicator\Communicator as BasicCommunicator;

class Communicator extends BasicCommunicator
{
    const SECURITY_TOKEN_HEADER = 'Service-Security';

    public function __construct(
        string $baseUri,
        string $securityToken,
        array $headers = [],
        ?LoggerInterface $logger = null
    ) {
        $headers[static::SECURITY_TOKEN_HEADER] = $securityToken;

        parent::__construct($baseUri, $headers, $logger);
    }

    public function accessibleFeatures(WhitelistAccessibleFeaturesRequest $request): WhitelistAccessibleFeaturesResult
    {
        $uri      = '/api/v1/whitelist';
        $response = $this->request(self::METHOD_GET, $uri, $request->toArray());

        $data = json_decode($response->getBody()->__toString(), true);

        if (json_last_error() != JSON_ERROR_NONE) {
            $data = [];
        }

        return new WhitelistAccessibleFeaturesResult($data);
    }
}
