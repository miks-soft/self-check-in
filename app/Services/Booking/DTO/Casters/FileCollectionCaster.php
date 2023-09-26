<?php


namespace App\Services\Booking\DTO\Casters;


use App\Services\Booking\DTO\Collections\FileCollection;
use App\Services\Booking\DTO\Objects\FileDTO;
use Spatie\DataTransferObject\Caster;

class FileCollectionCaster implements Caster
{
    public function cast(mixed $value): FileCollection
    {
        return new FileCollection(array_map(
            fn ($data) => is_array($data) ? new FileDTO(...$data) : new FileDTO(['src' => $data]),
            is_array($value) ? $value : json_decode($value, true)
        ));
    }
}
