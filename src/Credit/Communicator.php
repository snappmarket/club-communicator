<?php

namespace SnappMarket\Credit;

use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
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
    /**
     * @param BalanceGetterRequest $request
     * @return BalanceGetterResult
     * @throws \Exception
     */
    public function getBalance(BalanceGetterRequest $request): BalanceGetterResult
    {
        return new BalanceGetterResult(
            $this->sendRequest('balance/by/' . $request->getEntity(), $request)
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
            $this->sendRequest('withdraw', $request)
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
            $this->sendRequest('verify', $request)
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
            $this->sendRequest('settle', $request)
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
            $this->sendRequest('withdraw-verify', $request)
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
            $this->sendRequest('status', $request)
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
            $this->sendRequest('revert', $request)
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
            $this->sendRequest('cancel', $request)
        );
    }

    private function sendRequest(string $uri, BaseRequest $request): array
    {
        try {
            $response = $this->request(
                self::METHOD_POST,
                $this->getCreditUri($uri),
                $request->toArray()
            );

            $this->logger->info('creditSendRequest', [
                'response_type' => gettype($response),
                'response_content' => $response
            ]);

            if ($response instanceof ResponseInterface) {
                $response = json_decode($response->getBody()->__toString(), true);
                $this->logger->info('creditSendRequestResponseInstance', ['response' => $response]);
                return $response;

            }

            if (is_array($response)) {
                $this->logger->info('creditSendRequestResponseArray', ['response' => $response]);
                return $response;
            }

            return [];

        } catch (\Exception $exception) {
            $this->logger->error('creditSendRequestException', [
                'exception_message' => $exception->getMessage(),
                'exception_file' => $exception->getFile(),
                'exception_line' => $exception->getLine()
            ]);
            return [];
        }
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
