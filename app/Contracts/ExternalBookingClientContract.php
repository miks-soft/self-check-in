<?php


namespace App\Contracts;

use App\Objects\Models\BookingAggregate;
use App\Objects\Models\BookingInterval;
use App\Services\Booking\DTO\Objects\ExternalBookingDTO;
use App\Services\Booking\DTO\Objects\ExternalPaymentDTO;
use App\Services\Booking\DTO\Objects\ExternalPrintDTO;
use App\Services\Booking\DTO\Objects\AvailableRoomCollectionDTO;
use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;


interface ExternalBookingClientContract {
    public function availableRooms(BookingInterval $interval): AvailableRoomCollectionDTO;
    public function paymentStatus(string $bookingId): ExternalPaymentDTO;
    public function print(string $bookingId): ExternalPrintDTO;
    public function printStatus(string $commandId): ExternalPrintDTO;
    public function sendBooking(BookingAggregate $bookingAggregate): ExternalBookingDTO;
    public function annulateBooking(string $bookingId): ExternalAnnulateDTO;
}
