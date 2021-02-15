<?php

namespace SnappMarket\Club\Results;

class OrderStatusChangedTriggerResponse
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
