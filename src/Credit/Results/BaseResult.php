<?php

namespace SnappMarket\Credit\Results;

class BaseResult
{
    /** @var array */
    protected $response;

    /**
     * BaseResult constructor.
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response['data'];
    }

    public function getSuccessful(): bool
    {
        return $this->getResponse()['successful'];
    }

    public function getResponseType():string
    {
        return $this->getResponse()['response_type'];
    }

    public function getMessage(): string
    {
        return $this->getResponse()['message'];
    }

    public function getStatusCode(): int
    {
        return $this->getResponse()['status_code'];
    }

    public function getErrorCode(): int
    {
        return $this->getResponse()['error_code'];
    }

    public function getData(): array
    {
        return $this->getResponse()['data'];
    }
}
