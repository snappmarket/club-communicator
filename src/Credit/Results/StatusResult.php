<?php

namespace SnappMarket\Credit\Results;

class StatusResult extends BaseResult
{
    public function getStatus()
    {
        return $this->getData()['status'] ?? null;
    }

    public function getTransactionId()
    {
        return $this->getData()['transactionId'] ?? null;
    }
}