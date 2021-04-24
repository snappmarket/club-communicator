<?php

namespace SnappMarket\Credit\Results;

class BalanceGetterResult extends BaseResult
{
    public function getBalance()
    {
        return $this->getData()['balance'] ?? null;
    }

    public function getWalletNumber()
    {
        return $this->getData()['walletNumber'] ?? null;
    }
}