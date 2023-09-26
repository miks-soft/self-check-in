<?php


namespace App\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Http\Requests\AnnulateBookingRequest;
use App\Services\Booking\DTO\Objects\AnnulateBookingActionDTO;

class AnnulateBookingActionDTOFactory {
    public function make(...$args): AnnulateBookingActionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof AnnulateBookingRequest
        )
            return $this->makeByRequest($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByRequest(AnnulateBookingRequest $request) : AnnulateBookingActionDTO {
        return new AnnulateBookingActionDTO($request->validated());
    }
}
