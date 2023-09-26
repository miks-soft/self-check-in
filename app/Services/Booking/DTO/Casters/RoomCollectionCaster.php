<?php


namespace App\Services\Booking\DTO\Casters;


use App\Services\Booking\DTO\Collections\RoomCollection;
use App\Services\Booking\DTO\Objects\RoomDTO;
use Spatie\DataTransferObject\Caster;

class RoomCollectionCaster implements Caster
{
    public function cast(mixed $value): RoomCollection
    {
        return new RoomCollection(array_map(
            fn (array $data) => new RoomDTO(...$data),
            $value
        ));
    }
}
