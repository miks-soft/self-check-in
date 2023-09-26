<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;

class ExternalRoomDTO extends DataTransferObject {
    public string $roomId;
    public int $price;
    public int $count;
    public string $tariffId;
    public string $boardingId;
    public bool $byBedsVariant;
}
