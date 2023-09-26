<?php


namespace App\Objects\Factories;

use App\Objects\Models\BookingInterval;
use App\Exceptions\BadFactoryParamException;
use Carbon\Carbon;

class BookingIntervalFactory {
    public function make(...$args): BookingInterval {
        if (
            count($args) === 2
            && $args[0] instanceof Carbon
            && $args[1] instanceof Carbon
        ) {
            return $this->makeByDates($args[0], $args[1]);
        }

        throw new BadFactoryParamException();
    }

    protected function makeByDates(Carbon $dateIn, Carbon $dateOut): BookingInterval {
        return new BookingInterval($dateIn, $dateOut);
    }
}
