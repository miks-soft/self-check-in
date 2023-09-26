<?php


namespace App\Contracts;

use App\Services\Localization\DTO\Objects\LocaleCollectionDTO;
use App\Services\Localization\DTO\Objects\LocalizationCollectionDTO;

interface LocalizationServiceContract {
    public function locales(): LocaleCollectionDTO;
    public function localization(?string $locale = null): LocalizationCollectionDTO;
}
