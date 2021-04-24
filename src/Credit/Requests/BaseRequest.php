<?php

namespace SnappMarket\Credit\Requests;

abstract class BaseRequest
{
    /** @var int */
    private $xUserId;

    /** @var int */
    private $userId;

    /** @var string */
    private $mobile;

    /**
     * BaseRequest constructor.
     * @param int $xUserId
     * @param int $userId
     * @param string $mobile
     */
    public function __construct(int $xUserId, int $userId, string $mobile)
    {
        $this->xUserId = $xUserId;
        $this->userId = $userId;
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getXUserId(): string
    {
        return $this->xUserId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $request = [
            'xUserId'  => $this->getXUserId(),
            'userId'   => $this->getUserId(),
            'mobile'   => $this->getMobile()
        ];

        if (! empty($this->getRequest()))
            $request = array_merge($request, $this->getRequest());

        return $request;
    }

    /**
     * @return array
     */
    abstract public function getRequest(): array;
}