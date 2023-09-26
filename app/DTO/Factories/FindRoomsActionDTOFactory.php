<?php


namespace App\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Http\Requests\FindRoomsRequest;
use App\Services\Booking\DTO\Objects\FindRoomsActionDTO;


class FindRoomsActionDTOFactory {
    public function make(...$args): FindRoomsActionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof FindRoomsRequest
        )
            return $this->makeByRequest($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByRequest(FindRoomsRequest $request) : FindRoomsActionDTO {
        return new FindRoomsActionDTO($request->validated());
    }
}
