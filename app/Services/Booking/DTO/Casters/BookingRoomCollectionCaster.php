<?php


namespace App\Services\Booking\DTO\Casters;


use App\Services\Booking\DTO\Collections\BookingRoomCollection;
use App\Services\Booking\DTO\Objects\BookingRoomDTO;
use Spatie\DataTransferObject\Caster;

class BookingRoomCollectionCaster implements Caster
{
    public function cast(mixed $value): BookingRoomCollection
    {
        return new BookingRoomCollection(array_map(
            fn (array $data) => new BookingRoomDTO(...$data),
            $value
        ));
    }
}
