<?php


namespace App\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Http\Requests\PrintStatusRequest;
use App\Services\Booking\DTO\Objects\CheckPaymentStatusActionDTO;
use App\Services\Booking\DTO\Objects\CheckPrintStatusDTO;

class CheckPrintStatusActionDTOFactory {
    public function make(...$args): CheckPrintStatusDTO {
        if (
            count($args) === 1
            && $args[0] instanceof PrintStatusRequest
        )
            return $this->makeByRequest($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByRequest(PrintStatusRequest $request) : CheckPrintStatusDTO {
        return new CheckPrintStatusDTO($request->validated());
    }
}
