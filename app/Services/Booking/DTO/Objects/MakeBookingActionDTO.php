<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Collections\BookingRoomCollection;
use Spatie\DataTransferObject\Attributes\CastWith;
use App\Services\Booking\DTO\Casters\BookingRoomCollectionCaster;


class MakeBookingActionDTO extends DataTransferObject {
    public ContactDTO $contact;
    public PaysystemDTO $paysystem;

    #[CastWith(BookingRoomCollectionCaster::class)]
    public BookingRoomCollection $rooms;
}
