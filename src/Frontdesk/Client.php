<?php


namespace GettSleep\Frontdesk;

use GettSleep\Frontdesk\Collection\Reserves;
use GettSleep\Frontdesk\Exception\FrontdeskServerError;
use GettSleep\Frontdesk\Exception\HttpClientException;
use GettSleep\Frontdesk\Request\AnnulateOrderRequest;
use GettSleep\Frontdesk\Request\CreateOrderRequest;
use GettSleep\Frontdesk\Request\FindRoomsRequest;
use GettSleep\Frontdesk\Request\PaymentStatusRequest;
use GettSleep\Frontdesk\Request\PrintRequest;
use GettSleep\Frontdesk\Request\PrintStatusRequest;
use GettSleep\Frontdesk\Request\Request;
use GettSleep\Frontdesk\Response\CreateOrderResponse;
use GettSleep\Frontdesk\Response\ErrorResponse;
use GettSleep\Frontdesk\Response\FindRoomsResponse;
use GettSleep\Frontdesk\Response\PaymentStatusResponse;
use GettSleep\Frontdesk\Response\PrintResponse;
use GettSleep\Frontdesk\Response\PrintStatusResponse;
use GettSleep\Frontdesk\Response\AnnulateOrderResponse;
use GettSleep\Frontdesk\Response\ResponseFactory;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class Client {

    public function __construct(
        protected LoggerInterface $logger,
        protected OptionsProvider $optionsProvider,
        protected ClientInterface $client,
        protected RequestConverter $requestConverter,
        protected ResponseFactory $responseFactory = new ResponseFactory()
    ) {
    }

    protected function makeRequest(Request $request): ResponseInterface {
        try {
            $psrRq = $this->requestConverter->convert($request);

            $this->logger->debug('Frontdesk request', [
                'method' => $psrRq->getMethod(),
                'headers' => $psrRq->getHeaders(),
                'uri' => $psrRq->getUri()->__toString(),
                'body' => urldecode($psrRq->getBody()->getContents())
            ]);

            $result = $this->client->sendRequest($psrRq);

            $this->logger->debug('Frontdesk response', [
                'headers' => $result->getHeaders(),
                'status' => $result->getStatusCode(),
                'body' => $result->getBody()->__toString()
            ]);
        }
        catch (\Exception $e) {
            throw new HttpClientException($e);
        }

        if ($result->getStatusCode() !== 200)
            throw new FrontdeskServerError;

        return $result;
    }

    public function findRooms(
        \DateTime $arrival,
        \DateTime $depart
    ): FindRoomsResponse | ErrorResponse {
        $request = new FindRoomsRequest(
            $this->optionsProvider->getUrl(),
            $this->optionsProvider->getToken(),
            $arrival,
            $depart
        );

        $result = $this->makeRequest($request);

        return $this->responseFactory->make($request, $result);
    }

    public function createOrder(
        Reserves $reserves
    ): CreateOrderResponse | ErrorResponse {
        $request = new CreateOrderRequest(
            $this->optionsProvider->getUrl(),
            $this->optionsProvider->getReservationToken(),
            $reserves
        );

        $result = $this->makeRequest($request);

        return $this->responseFactory->make($request, $result);
    }

    public function paymentStatus(string $orderId): PaymentStatusResponse | ErrorResponse {
        $request = new PaymentStatusRequest(
            $this->optionsProvider->getUrl(),
            $this->optionsProvider->getToken(),
            $orderId
        );

        $result = $this->makeRequest($request);

        return $this->responseFactory->make($request, $result);
    }

    public function print(string $orderId): PrintResponse | ErrorResponse {
        $request = new PrintRequest(
            $this->optionsProvider->getUrl(),
            $this->optionsProvider->getToken(),
            $orderId
        );

        $result = $this->makeRequest($request);

        return $this->responseFactory->make($request, $result);
    }

    public function printStatus(string $commandId): PrintStatusResponse | ErrorResponse {
        $request = new PrintStatusRequest(
            $this->optionsProvider->getUrl(),
            $this->optionsProvider->getToken(),
            $commandId
        );

        $result = $this->makeRequest($request);

        return $this->responseFactory->make($request, $result);
    }

    public function annulateOrder(string $orderId): AnnulateOrderResponse | ErrorResponse {
        $request = new AnnulateOrderRequest(
            $this->optionsProvider->getUrl(),
            $this->optionsProvider->getReservationToken(),
            $orderId
        );

        $result = $this->makeRequest($request);

        return $this->responseFactory->make($request, $result);
    }
}
