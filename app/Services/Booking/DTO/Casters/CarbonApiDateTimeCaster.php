<?php


namespace App\Services\Booking\DTO\Casters;

use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\Caster;

class CarbonApiDateTimeCaster implements Caster
{
    public function cast(mixed $value): Carbon
    {
        return Carbon::createFromFormat(config('api.datetime.format'), $value);
    }
}
