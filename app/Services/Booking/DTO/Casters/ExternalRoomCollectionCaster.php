<?php


namespace App\Services\Booking\DTO\Casters;


use App\Services\Booking\DTO\Collections\ExternalRoomCollection;
use App\Services\Booking\DTO\Objects\ExternalRoomDTO;
use Spatie\DataTransferObject\Caster;

class ExternalRoomCollectionCaster implements Caster
{
    public function cast(mixed $value): ExternalRoomCollection
    {
        return new ExternalRoomCollection(array_map(
            fn (array $data) => new ExternalRoomDTO(...$data),
            $value->toArray()
        ));
    }
}
