<?php


namespace App\Services\Booking\DTO\Factories;

use App\Objects\Models\BookingInterval;
use App\Services\Booking\DTO\Objects\AvailableRoomCollectionDTO;
use App\Exceptions\BadFactoryParamException;
use Illuminate\Support\Collection;

class AvailableRoomCollectionDTOFactory {
    public function make(...$args): AvailableRoomCollectionDTO {
        if (
            count($args) === 2
            && $args[0] instanceof BookingInterval
            && $args[1] instanceof Collection
        )
            return $this->makeByIntervalAndCollection($args[0], $args[1]);

        throw new BadFactoryParamException();
    }

    protected function makeByIntervalAndCollection(BookingInterval $interval, Collection $collection) : AvailableRoomCollectionDTO {
        return new AvailableRoomCollectionDTO(['rooms' => $collection, 'dateIn' => $interval->dateIn(), 'dateOut' => $interval->dateOut()]);
    }
}
