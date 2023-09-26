<?php


namespace App\Objects\Models;

use App\Exceptions\InvalidArgumentException;
use App\Exceptions\MaxBookingException;
use App\Exceptions\MinBookingException;
use Carbon\Carbon;

class BookingInterval {


    public function __construct(
        protected Carbon $dateIn,
        protected Carbon $dateOut
    ) {

        if (
            $this->dateOut <= $this->dateIn
        ) {
            throw new InvalidArgumentException('Incorrect date interval.');
        }

        $diff = $this->dateOut->diff($this->dateIn);
        if (
            $diff->days === 0
            && $diff->h < config('booking.min_booking_hours')
        ) {
            throw new MinBookingException('Minimal booking time is '.config('booking.min_booking_hours').' hours.');
        }

        if (
            ($diff->days * 24 + $diff->h) > config('booking.max_booking_hours')
        ) {
            throw new MaxBookingException('Maximum booking time is '.config('booking.max_booking_hours').' hours.');
        }
    }

    public function dateIn() {
        return $this->dateIn;
    }

    public function dateOut() {
        return $this->dateOut;
    }
}
