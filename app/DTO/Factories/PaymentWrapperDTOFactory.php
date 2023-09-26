<?php


namespace App\DTO\Factories;

use App\DTO\Objects\PaymentWrapperDTO;
use App\Exceptions\BadFactoryParamException;
use App\Services\Booking\DTO\Objects\PaymentDTO;

class PaymentWrapperDTOFactory {
    public function make(...$args): PaymentWrapperDTO {
        if (
            count($args) === 1
            && $args[0] instanceof PaymentDTO
        )
            return $this->makeByPayment($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByPayment(PaymentDTO $paymentDTO) : PaymentWrapperDTO {
        return new PaymentWrapperDTO(['payment' => $paymentDTO]);
    }
}
