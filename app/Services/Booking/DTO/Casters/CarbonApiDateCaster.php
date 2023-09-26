<?php


namespace App\Services\Booking\DTO\Casters;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Spatie\DataTransferObject\Caster;

class CarbonApiDateCaster implements Caster
{
    public function cast(mixed $value): Carbon
    {
        return Carbon::createFromFormat(Config::get('api.date.format'), $value);
    }
}
