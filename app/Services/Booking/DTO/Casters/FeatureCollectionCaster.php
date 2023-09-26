<?php


namespace App\Services\Booking\DTO\Casters;


use App\Services\Booking\DTO\Collections\FeatureCollection;
use App\Services\Booking\DTO\Objects\FeatureDTO;
use Spatie\DataTransferObject\Caster;

class FeatureCollectionCaster implements Caster
{
    public function cast(mixed $value): FeatureCollection
    {
        return new FeatureCollection(array_map(
            fn (array $data) => new FeatureDTO(...$data),
            $value
        ));
    }
}
