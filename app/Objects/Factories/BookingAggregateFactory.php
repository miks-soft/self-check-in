<?php


namespace App\Objects\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Objects\Models\BookingAggregate;
use App\Objects\Models\Contact;
use App\Objects\Models\Paysystem;
use App\Services\Booking\DTO\Collections\BookingRoomCollection;
use App\Services\Booking\DTO\Objects\ContactDTO;
use App\Services\Booking\DTO\Objects\MakeBookingActionDTO;
use App\Services\Booking\DTO\Objects\PaysystemDTO;
use App\Services\Booking\DTO\Objects\RoomCollectionDTO;

class BookingAggregateFactory {
    public function make(...$args): BookingAggregate {
        if (
            count($args) === 5
            && $args[0] instanceof Contact
            && $args[1] instanceof Paysystem
            && $args[2] instanceof BookingRoomCollection
            && is_array($args[3])
            && $args[4] instanceof RoomCollectionDTO
        ) {
            return $this->makeByBookingActionAndRoomCollections($args[0], $args[1], $args[2], $args[3], $args[4]);
        }

        throw new BadFactoryParamException();
    }

    protected function makeByBookingActionAndRoomCollections(Contact $contact, Paysystem $paysystem, BookingRoomCollection $roomCollection, array $externalRooms, RoomCollectionDTO $internalRooms): BookingAggregate {
        $booking = app(BookingFactory::class)->make();
        $rooms = [];

        foreach ($roomCollection as $room) {
            $internalRoom = $internalRooms->rooms->filter(function($item) use ($room) {
                return $item->id == $room->id;
            })->first();

            foreach ($externalRooms as $externalRoomsCollection) {
                $externalRoom = null;
                if ($externalRoomsCollection->dateIn == $room->dateIn && $externalRoomsCollection->dateOut == $room->dateOut)
                    $externalRoom = $externalRoomsCollection->rooms->filter(function ($item) use ($internalRoom) {
                        return $item->roomId == $internalRoom->externalId;
                    })->first();
                if ($externalRoom !== null)
                    break;
            }

            $rooms[] = app(RoomFactory::class)->make($room, $internalRoom, $externalRoom);
        }


        $rooms = app(RoomCollectionFactory::class)->make($rooms);

        return new BookingAggregate(
            $booking,
            $contact,
            $paysystem,
            $rooms
        );
    }
}
