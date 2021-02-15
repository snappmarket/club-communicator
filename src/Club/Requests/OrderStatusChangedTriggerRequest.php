<?php

namespace SnappMarket\Club\Requests;

class OrderStatusChangedTriggerRequest
{
    private $orderId;


    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }



    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
