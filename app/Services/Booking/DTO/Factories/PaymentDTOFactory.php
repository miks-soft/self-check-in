<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\PaymentDTO;
use App\Services\Booking\Enum\PaymentStatusEnum;
use App\Exceptions\BadFactoryParamException;

class PaymentDTOFactory {
    public function make(...$args): PaymentDTO {
        if (
            count($args) === 2
            && is_string($args[0])
            && $args[1] instanceof PaymentStatusEnum
        )
            return $this->makeByBookingEnum($args[0], $args[1]);

        throw new BadFactoryParamException();
    }

    protected function makeByBookingEnum(string $bookingId, PaymentStatusEnum $status) : PaymentDTO {
        return new PaymentDTO(['bookingId' => $bookingId,'status' => $status]);
    }
}
