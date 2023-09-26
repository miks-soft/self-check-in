<?php


namespace App\Services\Localization\DTO\Collections;


use App\Services\Localization\DTO\Objects\LocaleDTO;
use Illuminate\Support\Collection;

class LocaleCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): LocaleDTO
    {
        return parent::offsetGet($key);
    }
}
