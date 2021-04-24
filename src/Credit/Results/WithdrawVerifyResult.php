<?php

namespace SnappMarket\Credit\Results;

class WithdrawVerifyResult extends BaseResult
{
    public function getAmount()
    {
        return $this->getData()['amount'] ?? null;
    }

    public function getBalance()
    {
        return $this->getData()['balance'] ?? null;
    }

    public function getTransactionId()
    {
        return $this->getData()['transactionId'] ?? null;
    }

    public function getWalletNumber()
    {
        return $this->getData()['walletNumber'] ?? null;
    }
}