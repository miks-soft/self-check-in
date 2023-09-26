<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\PaymentDTO;
use App\Services\Booking\DTO\Objects\PaysystemDTO;
use App\Services\Booking\Enum\PaymentStatusEnum;
use App\Exceptions\BadFactoryParamException;
use TCG\Voyager\Translator;

class PaysystemDTOFactory {
    public function make(...$args): PaysystemDTO {
        if (
            count($args) === 1
            && $args[0] instanceof \JsonSerializable
        )
            return $this->makeByJsonSerializable($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByJsonSerializable(\JsonSerializable $json) : PaysystemDTO {
        return new PaysystemDTO(...$json->jsonSerialize());
    }
}
