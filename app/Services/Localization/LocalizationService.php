<?php


namespace App\Services\Localization;

use App\Contracts\LocalizationRepositoryContract;
use App\Contracts\LocalizationServiceContract;
use App\Services\Localization\DTO\Factories\LocaleCollectionDTOFactory;
use App\Services\Localization\DTO\Factories\LocalizationCollectionDTOFactory;
use App\Services\Localization\DTO\Objects\LocaleCollectionDTO;
use App\Services\Localization\DTO\Objects\LocalizationCollectionDTO;
use Illuminate\Support\Facades\Config;

class LocalizationService implements LocalizationServiceContract {
    public function __construct(
        private LocalizationRepositoryContract $_localizationRepository
    )
    {
    }

    public function locales(): LocaleCollectionDTO {
        return app(LocaleCollectionDTOFactory::class)->make($this->_localizationRepository->locales());
    }

    public function localization(?string $locale = null): LocalizationCollectionDTO {
        $locale = is_null($locale) ? Config::get('app.locale') : $locale;
        return app(LocalizationCollectionDTOFactory::class)->make($this->_localizationRepository->texts($locale));
    }
}
