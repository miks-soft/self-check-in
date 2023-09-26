<?php


namespace App\Objects\Factories;

use App\Objects\Models\BookingInterval;
use App\Exceptions\BadFactoryParamException;
use App\Objects\Models\Booking;
use Illuminate\Support\Carbon;

class BookingFactory {
    public function make(...$args): Booking {
        if (
            count($args) === 1
            && $args[0] instanceof BookingInterval
        ) {
            return $this->makeByInterval($args[0]);
        }
        elseif (count($args) === 0) {
            return $this->makeEmpty();
        }

        throw new BadFactoryParamException();
    }

    protected function makeByInterval(BookingInterval $interval): Booking {
        return new Booking();
    }

    protected function makeEmpty(): Booking {
        return new Booking;
    }
}
