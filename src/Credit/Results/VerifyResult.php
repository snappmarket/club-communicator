<?php

namespace SnappMarket\Credit\Results;

class VerifyResult extends BaseResult
{
    public function getAmount()
    {
        return $this->getData()['amount'] ?? null;
    }

    public function getTransactionId()
    {
        return $this->getData()['transactionId'] ?? null;
    }
}