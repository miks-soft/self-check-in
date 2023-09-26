<?php


namespace App\Services\Booking\DTO\Casters;

use Illuminate\Support\Facades\Storage;
use Spatie\DataTransferObject\Caster;

class StorageAssetSrcCaster implements Caster
{
    public function cast(mixed $value): string
    {
        return asset(Storage::url($value));
    }
}
