<?php

namespace SnappMarket\Credit\Requests;

class BalanceGetterRequest extends BaseRequest
{
    /** @var string */
    private $entity;

    /**
     * BalanceGetterRequest constructor.
     * @param int $xUserId
     * @param int $userId
     * @param string $mobile
     * @param string $entity
     */
    public function __construct(int $xUserId, int $userId, string $mobile, string $entity)
    {
        $this->entity = $entity;
        parent::__construct($xUserId, $userId, $mobile);
    }

    public function getRequest(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }
}