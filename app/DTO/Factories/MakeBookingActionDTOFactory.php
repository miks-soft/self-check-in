<?php


namespace App\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Http\Requests\BookingRequest;
use App\Services\Booking\DTO\Objects\MakeBookingActionDTO;


class MakeBookingActionDTOFactory {
    public function make(...$args): MakeBookingActionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof BookingRequest
        )
            return $this->makeByRequest($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByRequest(BookingRequest $bookingRequest) : MakeBookingActionDTO {
        return new MakeBookingActionDTO([
            'contact' => $bookingRequest->validated()['contact'],
            'rooms' => $bookingRequest->validated()['rooms'],
            'paysystem' => ['id' => $bookingRequest->validated()['paysystem']],
        ]);
    }
}
