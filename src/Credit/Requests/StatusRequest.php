<?php

namespace SnappMarket\Credit\Requests;

class StatusRequest extends BaseRequest
{
    /** @var float */
    private $amount;

    /** @var string */
    private $transactionId;

    /**
     * WithdrawRequest constructor.
     * @param int $xUserId
     * @param int $userId
     * @param string $mobile
     * @param float $amount
     * @param string $transactionId
     */
    public function __construct(
        int $xUserId, int $userId, string $mobile, float $amount, string $transactionId)
    {
        $this->amount = $amount;
        $this->transactionId = $transactionId;
        parent::__construct($xUserId, $userId, $mobile);
    }

    public function getRequest(): array
    {
        return [
            'amount' => $this->getAmount(),
            'transactionId' => $this->getTransactionId()
        ];
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }
}