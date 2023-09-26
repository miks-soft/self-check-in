<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Casters\CarbonApiDateTimeCaster;
use App\Services\Booking\DTO\Collections\FeatureCollection;
use App\Services\Booking\DTO\Collections\FileCollection;
use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\FeatureCollectionCaster;
use App\Services\Booking\DTO\Casters\FileCaster;
use App\Services\Booking\DTO\Casters\FileCollectionCaster;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class RoomDTO extends DataTransferObject {
    public string $id;

    #[MapFrom('fd24_id')]
    public ?string $externalId = '';
    public ?string $title = '';

    #[MapFrom('room_type.title')]
    public ?string $type = null;
    public ?string $description = '';

    public int $price = 0;
    public int $availableCount = 0;
    public int $beds = 0;

    public ?CategoryDTO $category;
    #[CastWith(FeatureCollectionCaster::class)]
    public ?FeatureCollection $features;

    #[CastWith(FileCollectionCaster::class)]
    public ?FileCollection $pictures;
}
