<?php


namespace App\DTO\Factories;

use App\DTO\Objects\AnnulateBookingWrapperDTO;
use App\Exceptions\BadFactoryParamException;
use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;

class AnnulateBookingWrapperDTOFactory {
    public function make(...$args): AnnulateBookingWrapperDTO {
        if (
            count($args) === 1
            && $args[0] instanceof ExternalAnnulateDTO
        )
            return $this->makeByAnnulate($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByAnnulate(ExternalAnnulateDTO $annulateDTO) : AnnulateBookingWrapperDTO {
        return new AnnulateBookingWrapperDTO(['annulate' => $annulateDTO]);
    }
}
