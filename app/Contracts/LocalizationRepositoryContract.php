<?php


namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface LocalizationRepositoryContract {
    public function locales(): Collection;
    public function texts(string $locale): \TCG\Voyager\Translator\Collection;
}
