<?php


namespace GettSleep\Frontdesk\Enum;

enum PaymentStatusEnum: string {
    case Waiting = 'waiting';
    case Failed = 'failed';
    case Paid = 'paid';
}
