<?php


namespace App\Services\Localization\DTO\Objects;

use App\DTO\DataTransferObject;

class LocalizationDTO extends DataTransferObject {
    public string $slug;
    public string $text;
}
