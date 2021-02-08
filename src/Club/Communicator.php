<?php

namespace SnappMarket\Club;

use Psr\Log\LoggerInterface;
use SnappMarket\Club\Requests\LoyaltyJwtRequest;
use SnappMarket\Club\Requests\LoyaltyPointsRequest;
use SnappMarket\Club\Results\LoyaltyJwtResult;
use SnappMarket\Club\Results\LoyaltyPointsResult;
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



    public function getLoyaltyJwt(LoyaltyJwtRequest $request): LoyaltyJwtResult
    {
        $uri      = '/api/loyalty/v1/users/' . $request->getUserId() . '/jwt-token';
        $response = $this->request(self::METHOD_GET, $uri);

        $data = json_decode($response->getBody()->__toString(), true);

        $userId = $data['metadata']['user_id'];
        $token  = $data['results']['token'];

        return new LoyaltyJwtResult($userId, $token);
    }



    public function getLoyaltyPoints(LoyaltyPointsRequest $request): LoyaltyPointsResult
    {
        $uri      = '/api/loyalty/v1/users/' . $request->getUserId() . '/points';
        $response   = $this->request(self::METHOD_GET, $uri);

        $data = json_decode($response->getBody()->__toString(), true);

        $userId = $data['metadata']['user_id'];
        $points = $data['results']['points'];

        return new LoyaltyPointsResult($userId, $points);
    }
}
