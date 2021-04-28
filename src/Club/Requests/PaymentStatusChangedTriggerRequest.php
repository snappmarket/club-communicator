<?php

namespace SnappMarket\Club\Requests;

class PaymentStatusChangedTriggerRequest
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
