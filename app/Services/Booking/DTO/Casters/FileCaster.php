<?php


namespace App\Services\Booking\DTO\Casters;

use App\Services\Booking\DTO\Objects\FileDTO;
use Spatie\DataTransferObject\Caster;

class FileCaster implements Caster
{
    public function cast(mixed $value): FileDTO
    {
        return new FileDTO(['src' => is_array($value) ? $value['src'] : $value]);
    }
}
