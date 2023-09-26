<?php


namespace App\Services\Booking\Enum;

enum PaymentStatusEnum: string {
    case Waiting = 'Waiting';
    case Failed = 'Failed';
    case Paid = 'Paid';
}
