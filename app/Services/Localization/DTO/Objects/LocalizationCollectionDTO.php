<?php


namespace App\Services\Localization\DTO\Objects;

use App\Services\Localization\DTO\Collections\LocalizationCollection;
use App\DTO\DataTransferObject;
use App\Services\Localization\DTO\Casters\LocalizationCollectionCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class LocalizationCollectionDTO extends DataTransferObject {

    #[CastWith(LocalizationCollectionCaster::class)]
    public LocalizationCollection $localizations;
}
