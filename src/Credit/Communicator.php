<?php

namespace SnappMarket\Credit;

use GuzzleHttp\RequestOptions;
use SnappMarket\Communicator\Communicator as BasicCommunicator;
use SnappMarket\Credit\Requests\BalanceGetterRequest;
use SnappMarket\Credit\Requests\BaseRequest;
use SnappMarket\Credit\Requests\CancelRequest;
use SnappMarket\Credit\Requests\RevertRequest;
use SnappMarket\Credit\Requests\SettleRequest;
use SnappMarket\Credit\Requests\StatusRequest;
use SnappMarket\Credit\Requests\VerifyRequest;
use SnappMarket\Credit\Requests\WithdrawRequest;
use SnappMarket\Credit\Requests\WithdrawVerifyRequest;
use SnappMarket\Credit\Results\BalanceGetterResult;
use SnappMarket\Credit\Results\CancelResult;
use SnappMarket\Credit\Results\RevertResult;
use SnappMarket\Credit\Results\SettleResult;
use SnappMarket\Credit\Results\StatusResult;
use SnappMarket\Credit\Results\VerifyResult;
use SnappMarket\Credit\Results\WithdrawResult;
use SnappMarket\Credit\Results\WithdrawVerifyResult;

class Communicator extends BasicCommunicator
{
    protected $requestParameters = [];

    /**
     * @param BalanceGetterRequest $request
     * @return BalanceGetterResult
     * @throws \Exception
     */
    public function getBalance(BalanceGetterRequest $request): BalanceGetterResult
    {
        return new BalanceGetterResult(
            $this->getResponse('balance/by/' . $request->getEntity(), $request)
        );
    }

    /**
     * @param WithdrawRequest $request
     * @return WithdrawResult
     * @throws \Exception
     */
    public function withdraw(WithdrawRequest $request): WithdrawResult
    {
        return new WithdrawResult(
            $this->getResponse('withdraw', $request)
        );
    }

    /**
     * @param VerifyRequest $request
     * @return VerifyResult
     * @throws \Exception
     */
    public function verify(VerifyRequest $request): VerifyResult
    {
        return new VerifyResult(
            $this->getResponse('verify', $request)
        );
    }

    /**
     * @param SettleRequest $request
     * @return SettleResult
     * @throws \Exception
     */
    public function settle(SettleRequest $request): SettleResult
    {
        return new SettleResult(
            $this->getResponse('settle', $request)
        );
    }

    /**
     * @param WithdrawVerifyRequest $request
     * @return WithdrawVerifyResult
     * @throws \Exception
     */
    public function withdrawVerify(WithdrawVerifyRequest $request): WithdrawVerifyResult
    {
        return new WithdrawVerifyResult(
            $this->getResponse('withdraw-verify', $request)
        );
    }

    /**
     * @param StatusRequest $request
     * @return StatusResult
     * @throws \Exception
     */
    public function getStatus(StatusRequest $request): StatusResult
    {
        return new StatusResult(
            $this->getResponse('status', $request)
        );
    }

    /**
     * @param RevertRequest $request
     * @return RevertResult
     * @throws \Exception
     */
    public function revert(RevertRequest $request): RevertResult
    {
        return new RevertResult(
            $this->getResponse('revert', $request)
        );
    }

    /**
     * @param CancelRequest $request
     * @return CancelResult
     * @throws \Exception
     */
    public function cancel(CancelRequest $request): CancelResult
    {
        return new CancelResult(
            $this->getResponse('cancel', $request)
        );
    }

    private function getResponse(string $uri, BaseRequest $request): array
    {
        $this->requestParameters[RequestOptions::JSON] = $request->toArray();

        $response = $this->request(
            self::METHOD_POST,
            $this->getCreditUri($uri),
            $this->requestParameters
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $uri
     * @return string
     */
    private function getCreditUri(string $uri): string
    {
        return '/api/v1/credit/' . $uri;
    }
}
