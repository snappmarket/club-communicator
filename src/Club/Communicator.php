<?php

namespace SnappMarket\Club;

use SnappMarket\Club\Requests\LoyaltyJwtRequest;
use SnappMarket\Club\Results\LoyaltyJwtResult;
use SnappMarket\Communicator\Communicator as BasicCommunicator;

class Communicator extends BasicCommunicator
{
    public function getLoyaltyJwt(LoyaltyJwtRequest $request)
    {
        $uri      = '/api/loyalty/v1/users/' . $request->getUserId() . '/jwt-token';
        $response = $this->request(self::METHOD_GET, $uri);

        $data = json_decode($response->getBody()->__toString(), true);

        $userId = $data['metadata']['user_id'];
        $token  = $data['results']['token'];

        return new LoyaltyJwtResult($userId, $token);
    }
}
