<?php


namespace App\DTO\Factories;

use App\DTO\Objects\BookingWrapperDTO;
use App\Exceptions\BadFactoryParamException;
use App\Services\Booking\DTO\Objects\BookingDTO;


class BookingWrapperDTOFactory {
    public function make(...$args): BookingWrapperDTO {
        if (
            count($args) === 1
            && $args[0] instanceof BookingDTO
        )
            return $this->makeByBooking($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByBooking(BookingDTO $bookingDTO) : BookingWrapperDTO {
        return new BookingWrapperDTO(['booking' => $bookingDTO]);
    }
}
