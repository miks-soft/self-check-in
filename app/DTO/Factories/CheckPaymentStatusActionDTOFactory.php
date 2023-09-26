<?php


namespace App\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Http\Requests\PaymentStatusRequest;
use App\Services\Booking\DTO\Objects\CheckPaymentStatusActionDTO;

class CheckPaymentStatusActionDTOFactory {
    public function make(...$args): CheckPaymentStatusActionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof PaymentStatusRequest
        )
            return $this->makeByRequest($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByRequest(PaymentStatusRequest $request) : CheckPaymentStatusActionDTO {
        return new CheckPaymentStatusActionDTO($request->validated());
    }
}
