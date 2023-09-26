<?php


namespace App\DTO\Factories;

use App\DTO\Objects\PrintWrapperDTO;
use App\Exceptions\BadFactoryParamException;
use App\Services\Booking\DTO\Objects\ExternalPrintDTO as PrintDTO;


class PrintWrapperDTOFactory {
    public function make(...$args): PrintWrapperDTO {
        if (
            count($args) === 1
            && $args[0] instanceof PrintDTO
        )
            return $this->makeByPrint($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByPrint(PrintDTO $print) : PrintWrapperDTO {
        return new PrintWrapperDTO(['print' => $print]);
    }
}
