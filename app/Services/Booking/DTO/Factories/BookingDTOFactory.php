<?php


namespace App\Services\Booking\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Models\Booking;
use App\Services\Booking\DTO\Objects\BookingDTO;
use Illuminate\Support\Collection;

class BookingDTOFactory {
    public function make(...$args): BookingDTO {
        if (
            count($args) === 1
            && $args[0] instanceof Booking
        )
            return $this->makeByEloquent($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByEloquent(Booking $booking) : BookingDTO {
        return new BookingDTO([
            'id' => $booking->id,
            'totalCount' => $booking->count,
            'totalPrice' => $booking->total,
        ]);
    }
}
