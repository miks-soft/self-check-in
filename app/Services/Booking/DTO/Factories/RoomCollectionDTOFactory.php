<?php


namespace App\Services\Booking\DTO\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Services\Booking\DTO\Objects\AvailableRoomCollectionDTO;
use App\Services\Booking\DTO\Objects\ExternalRoomDTO;
use App\Services\Booking\DTO\Objects\RoomCollectionDTO;
use TCG\Voyager\Translator;
use TCG\Voyager\Translator\Collection;

class RoomCollectionDTOFactory {
    public function make(...$args) {
        if (
            count($args) === 2
            && $args[0] instanceof AvailableRoomCollectionDTO
            && $args[1] instanceof Collection
        )
            return $this->combineExternalAndInternal($args[0], $args[1]);

        if (
            count($args) === 1
            && $args[0] instanceof Collection
        )
            return $this->makeByInternal($args[0]);

        if (
            count($args) === 0
        )
            return $this->makeEmpty();

        throw new BadFactoryParamException();
    }

    protected function combineExternalAndInternal(AvailableRoomCollectionDTO $fdRooms, Collection $internalRooms) : RoomCollectionDTO {
        $rooms = [];

        $fdRooms->rooms->each(function (ExternalRoomDTO $room) use (&$rooms, $internalRooms){
            $internalRoom = $internalRooms->where('fd24_id', $room->roomId);
            if ($internalRoom = $internalRoom->first()) {
                $roomData = $internalRoom->jsonSerialize();
                $roomData['room_type'] = $internalRoom->room_type ? $internalRoom->room_type->jsonSerialize() : [];
                $roomData['category'] = $internalRoom->category ? $internalRoom->category->jsonSerialize() : [];
                $roomData['features'] = $internalRoom->features ? $internalRoom->features->jsonSerialize() : [];
                $roomData['price'] = $room->price;
                $roomData['availableCount'] = $room->count;
                $rooms[] = $roomData;
            }
        });

        return new RoomCollectionDTO(['rooms' => array_values($rooms)]);
    }

    protected function makeByInternal(Collection $internalRooms) : RoomCollectionDTO {
        $rooms = [];

        $internalRooms->each(function (Translator $room) use (&$rooms){
                $roomData = $room->jsonSerialize();
                $roomData['room_type'] = $room->room_type ? $room->room_type->jsonSerialize() : [];
                $roomData['category'] = $room->category ? $room->category->jsonSerialize() : [];
                $roomData['features'] = $room->features ? $room->features->jsonSerialize() : [];
                $rooms[] = $roomData;
        });

        return new RoomCollectionDTO(['rooms' => array_values($rooms)]);
    }

    protected function makeEmpty() : RoomCollectionDTO {
        return new RoomCollectionDTO(['rooms' => []]);
    }
}
