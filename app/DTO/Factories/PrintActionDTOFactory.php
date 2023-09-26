<?php


namespace App\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Http\Requests\PrintRequest;
use App\Services\Booking\DTO\Objects\PrintActionDTO;

class PrintActionDTOFactory {
    public function make(...$args): PrintActionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof PrintRequest
        )
            return $this->makeByRequest($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByRequest(PrintRequest $request) : PrintActionDTO {
        return new PrintActionDTO($request->validated());
    }
}
