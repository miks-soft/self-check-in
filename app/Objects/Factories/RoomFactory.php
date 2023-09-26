<?php


namespace App\Objects\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Objects\Models\BookingInterval;
use App\Objects\Models\Room;
use App\Services\Booking\DTO\Objects\BookingRoomDTO;
use App\Services\Booking\DTO\Objects\ExternalRoomDTO;
use App\Services\Booking\DTO\Objects\RoomDTO;

class RoomFactory {
    public function make(...$args): Room {
        if (
            count($args) === 3
            && $args[0] instanceof BookingRoomDTO
            && $args[1] instanceof RoomDTO
            && $args[2] instanceof ExternalRoomDTO
        ) {
            return $this->makeByDTOs($args[0], $args[1], $args[2]);
        }


        throw new BadFactoryParamException();
    }

    protected function makeByDTOs(BookingRoomDTO $bookingRoomDTO, RoomDTO $roomDTO, ExternalRoomDTO $externalRoomDTO): Room {
        $room = new Room(
            app(BookingIntervalFactory::class)->make($bookingRoomDTO->dateIn, $bookingRoomDTO->dateOut),
            $roomDTO->id,
            $externalRoomDTO->roomId,
            $bookingRoomDTO->count,
            $externalRoomDTO->count,
            $externalRoomDTO->price,
            $externalRoomDTO->tariffId,
            $externalRoomDTO->boardingId,
            $externalRoomDTO->byBedsVariant,
        );

        return $room;
    }
}
