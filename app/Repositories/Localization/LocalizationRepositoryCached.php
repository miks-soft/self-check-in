<?php
namespace App\Repositories\Localization;

use App\Contracts\LocalizationRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class LocalizationRepositoryCached implements LocalizationRepositoryContract
{
    private LocalizationRepositoryContract $base;
    private Cache $cache;

    public function __construct(
        LocalizationRepositoryContract $base, Cache $cache
    )
    {
        $this->base = $base;
        $this->cache = $cache;
    }

    public function locales() : Collection
    {
        return $this->cache::remember('locales.all', config('cache.ttl.localization'),
            fn() => $this->base->locales()
        );
    }

    public function texts(string $locale) : \TCG\Voyager\Translator\Collection
    {
        return $this->cache::remember('localization.texts.'.$locale, config('cache.ttl.localization'),
            fn() => $this->base->texts($locale)
        );
    }
}
