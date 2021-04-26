<?php

namespace SnappMarket\Club\Results;

class PaymentStatusChangedTriggerResponse
{
    private $paymentId;

    public function __construct(int $paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getPaymentId(): int
    {
        return $this->paymentId;
    }
}
