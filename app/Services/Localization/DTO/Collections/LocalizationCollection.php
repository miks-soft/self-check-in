<?php


namespace App\Services\Localization\DTO\Collections;


use App\Services\Localization\DTO\Objects\LocalizationDTO;
use Illuminate\Support\Collection;

class LocalizationCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): LocalizationDTO
    {
        return parent::offsetGet($key);
    }
}
