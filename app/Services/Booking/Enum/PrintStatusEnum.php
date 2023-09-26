<?php


namespace App\Services\Booking\Enum;

enum PrintStatusEnum: string {
    case Waiting = 'Waiting';
    case Printed = 'Printed';
}
