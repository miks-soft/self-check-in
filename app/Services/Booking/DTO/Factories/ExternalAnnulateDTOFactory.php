<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;
use App\Exceptions\BadFactoryParamException;
use GettSleep\Frontdesk\Response\AnnulateOrderResponse;

class ExternalAnnulateDTOFactory {
    public function make(...$args): ExternalAnnulateDTO {
        if (
            count($args) === 1
            && $args[0] instanceof AnnulateOrderResponse
        )
            return $this->makeByAnnulateOrderResponse($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByAnnulateOrderResponse(AnnulateOrderResponse $response) : ExternalAnnulateDTO {
        return new ExternalAnnulateDTO(['success' => $response->isSuccess()]);
    }
}
