<?php

namespace SnappMarket\Club;

use Psr\Log\LoggerInterface;
use SnappMarket\Club\Requests\LoyaltyJwtRequest;
use SnappMarket\Club\Requests\LoyaltyPointsRequest;
use SnappMarket\Club\Requests\LoyaltyPossiblePointsRequest;
use SnappMarket\Club\Requests\LoyaltyProfileRequest;
use SnappMarket\Club\Requests\OrderStatusChangedTriggerRequest;
use SnappMarket\Club\Results\LoyaltyJwtResult;
use SnappMarket\Club\Results\LoyaltyPointsResult;
use DateTime;
use SnappMarket\Club\Results\LoyaltyPossiblePointsResult;
use SnappMarket\Club\Results\LoyaltyProfileResult;
use SnappMarket\Club\Results\OrderStatusChangedTriggerResponse;
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

        $userId    = $data['metadata']['user_id'];
        $expiresAt = (new DateTime())->setTimestamp($data['metadata']['expires_at']);
        $token     = $data['results']['token'];

        return new LoyaltyJwtResult($userId, $token, $expiresAt);
    }



    public function getLoyaltyPoints(LoyaltyPointsRequest $request): LoyaltyPointsResult
    {
        $uri      = '/api/loyalty/v1/users/' . $request->getUserId() . '/points';
        $response = $this->request(self::METHOD_GET, $uri);

        $data = json_decode($response->getBody()->__toString(), true);

        $userId = $data['metadata']['user_id'];
        $points = $data['results']['points'];

        return new LoyaltyPointsResult($userId, $points);
    }



    public function getLoyaltyPossiblePoints(LoyaltyPossiblePointsRequest $request): LoyaltyPossiblePointsResult
    {
        $uri        = '/api/loyalty/v1/users/' . $request->getUserId() . '/possible-points';
        $parameters = ['value' => $request->getValue()];
        $response   = $this->request(self::METHOD_GET, $uri, $parameters);

        $data = json_decode($response->getBody()->__toString(), true);

        $userId = $data['metadata']['user_id'];
        $value  = $data['metadata']['value'];
        $points = $data['results']['points'];

        return new LoyaltyPossiblePointsResult($userId, $value, $points);
    }



    public function getLoyaltyProfile(LoyaltyProfileRequest $request): LoyaltyProfileResult
    {
        $uri      = '/api/loyalty/v1/users/' . $request->getUserId() . '/profile';
        $response = $this->request(self::METHOD_GET, $uri);

        $data = json_decode($response->getBody()->__toString(), true);

        $userId  = $data['metadata']['user_id'];
        $token   = $data['metadata']['jwt_token'];
        $isLoyal = $data['results']['is_loyal'];
        $points  = $data['results']['points'];

        return new LoyaltyProfileResult($userId, $isLoyal, $points, $token);
    }



    public function triggerOrderStatusChanged(OrderStatusChangedTriggerRequest $request
    ): OrderStatusChangedTriggerResponse {
        $uri      = '/api/v2/trigger/order-change/' . $request->getOrderId();
        $response = $this->request(self::METHOD_POST, $uri);

        $data = json_decode($response->getBody()->__toString(), true);

        $orderId = $data['metadata']['order_id'];

        return new OrderStatusChangedTriggerResponse($orderId);
    }
}
