<?php


namespace App\Services\Booking\DTO\Casters;

use App\Services\Booking\DTO\Collections\PaysystemCollection;
use App\Services\Booking\DTO\Objects\PaysystemDTO;
use Spatie\DataTransferObject\Caster;
use TCG\Voyager\Translator;

class PaysystemCollectionCaster implements Caster
{
    public function cast(mixed $value): PaysystemCollection
    {
        return new PaysystemCollection(array_map(
            fn (Translator $data) => new PaysystemDTO(...$data->jsonSerialize()),
            $value->toArray()
        ));
    }
}
