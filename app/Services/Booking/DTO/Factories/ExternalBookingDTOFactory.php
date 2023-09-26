<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\ExternalBookingDTO;
use App\Exceptions\BadFactoryParamException;
use GettSleep\Frontdesk\Response\CreateOrderResponse;

class ExternalBookingDTOFactory {
    public function make(...$args): ExternalBookingDTO {
        if (
            count($args) === 1
            && $args[0] instanceof CreateOrderResponse
        )
            return $this->makeByCreateOrderResponse($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByCreateOrderResponse(CreateOrderResponse $response) : ExternalBookingDTO {
        return new ExternalBookingDTO(['orderId' => $response->getOrderId()]);
    }
}
