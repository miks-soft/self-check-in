<?php


namespace App\Repositories\Localization;

use App\Contracts\LocalizationRepositoryContract;
use App\Models\Locale;
use App\Models\Localization;
use Illuminate\Database\Eloquent\Collection;

class LocalizationRepository implements LocalizationRepositoryContract {

    public function locales(): Collection {
        return Locale::all();
    }

    public function texts(string $locale): \TCG\Voyager\Translator\Collection {
        return Localization::withTranslation($locale)->get()->translate();
    }
}
