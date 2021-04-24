<?php

namespace SnappMarket\Credit\Requests;

class CancelRequest extends BaseRequest
{

    /** @var string */
    private $transactionId;

    /** @var int */
    private $orderReferenceId;

    /** @var string */
    private $orderReferenceType;

    /**
     * WithdrawRequest constructor.
     * @param int $xUserId
     * @param int $userId
     * @param string $mobile
     * @param string $transactionId
     * @param int $orderReferenceId
     * @param string $orderReferenceType
     */
    public function __construct(
        int $xUserId, int $userId, string $mobile, string $transactionId,
        int $orderReferenceId, string $orderReferenceType)
    {
        $this->transactionId = $transactionId;
        $this->orderReferenceId = $orderReferenceId;
        $this->orderReferenceType = $orderReferenceType;
        parent::__construct($xUserId, $userId, $mobile);
    }

    public function getRequest(): array
    {
        return [
            'transactionId' => $this->getTransactionId(),
            'orderReferenceId' => $this->getOrderReferenceId(),
            'orderReferenceType' => $this->getOrderReferenceType()
        ];
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @return int
     */
    public function getOrderReferenceId(): int
    {
        return $this->orderReferenceId;
    }

    /**
     * @return string
     */
    public function getOrderReferenceType(): string
    {
        return $this->orderReferenceType;
    }
}