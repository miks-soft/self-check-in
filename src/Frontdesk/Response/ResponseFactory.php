<?php


namespace GettSleep\Frontdesk\Response;

use GettSleep\Frontdesk\Collection\Rooms;
use GettSleep\Frontdesk\Enum\PaymentStatusEnum;
use GettSleep\Frontdesk\Enum\PrintStatusEnum;
use GettSleep\Frontdesk\Model\Room;
use GettSleep\Frontdesk\Request\AnnulateOrderRequest;
use GettSleep\Frontdesk\Request\CreateOrderRequest;
use GettSleep\Frontdesk\Request\FindRoomsRequest;
use GettSleep\Frontdesk\Request\PaymentStatusRequest;
use GettSleep\Frontdesk\Request\PrintRequest;
use GettSleep\Frontdesk\Request\PrintStatusRequest;
use GettSleep\Frontdesk\Request\Request;
use Psr\Http\Message\ResponseInterface;

class ResponseFactory {

    public function __construct(
    ) {
    }

    public function make(Request $request, ResponseInterface $response):
    ErrorResponse
    | FindRoomsResponse
    | CreateOrderResponse
    | PaymentStatusResponse
    | PrintResponse
    | PrintStatusResponse
    | AnnulateOrderResponse
    {
        $rawBody = $response->getBody()->__toString();

        if ($error = $this->checkError($rawBody))
            return $error;

        return match (get_class($request)) {
            FindRoomsRequest::class => $this->makeFindRooms($rawBody),
            CreateOrderRequest::class => $this->makeCreateOrder($rawBody),
            PaymentStatusRequest::class => $this->makePaymentStatus($rawBody),
            PrintRequest::class => $this->makePrint($rawBody),
            PrintStatusRequest::class => $this->makePrintStatus($rawBody),
            AnnulateOrderRequest::class => $this->makeAnnulateOrder($rawBody),
        };
    }

    protected function checkError(string $body): ?ErrorResponse {
        if (strlen($body) > 0) {
            $json = \json_decode($body);

            if (is_object($json) && property_exists($json, 'status') && $json->status == 500) {
                return new ErrorResponse($json->status, $json->errorDescription);
            }

            if (is_object($json) && property_exists($json, 'error') && strlen($json->error) > 0) {
                return new ErrorResponse(500, $json->error);
            }

            if (is_array($json) && property_exists($json[0], 'status') && $json[0]->status == 500) {
                return new ErrorResponse($json[0]->status, $json[0]->errorDescription);
            }
        }

        return null;
    }

    protected function makeFindRooms(string $body): FindRoomsResponse {
        $rawData = $body;

        $roomsArr = new Rooms();
        if (strlen($rawData) > 0) {
            $json = \json_decode($rawData);

            foreach ($json as $rawRoom) {
                $roomsArr[] = new Room($rawRoom->roomId, $rawRoom->count, $rawRoom->price, $rawRoom->tariffId, $rawRoom->boardingId, $rawRoom->byBedsVariant);
            }
        }
        return new FindRoomsResponse($roomsArr);
    }

    protected function makeCreateOrder(string $body): CreateOrderResponse {
        $json = \json_decode($body);

        return new CreateOrderResponse($json->orderId);
    }

    protected function makePaymentStatus(string $body): PaymentStatusResponse {
        $json = \json_decode($body)[0];

        return new PaymentStatusResponse(PaymentStatusEnum::from($json->payStatus));
    }

    protected function makePrint(string $body): PrintResponse {
        $json = \json_decode($body)[0];

        return new PrintResponse($json->commandID);
    }

    protected function makePrintStatus(string $body): PrintStatusResponse {
        $json = \json_decode($body)[0];

        return new PrintStatusResponse(PrintStatusEnum::from($json->errorDescription));
    }

    protected function makeAnnulateOrder(string $body): AnnulateOrderResponse {
        $json = \json_decode($body);

        return new AnnulateOrderResponse($json->success);
    }
}
