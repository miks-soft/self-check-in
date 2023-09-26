<?php


namespace App\Services\Localization\DTO\Objects;

use App\DTO\DataTransferObject;

class LocaleDTO extends DataTransferObject {
    public string $slug;
    public string $title;
}
