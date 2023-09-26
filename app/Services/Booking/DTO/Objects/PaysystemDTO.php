<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\FileCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class PaysystemDTO extends DataTransferObject {
    public string $id;

    #[MapFrom('fd24_id')]
    public ?string $externalId = '';
    public string $title = '';
    public string $description = '';

    #[CastWith(FileCaster::class)]
    public ?FileDTO $picture = null;
}
