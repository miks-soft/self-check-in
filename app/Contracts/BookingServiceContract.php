<?php


namespace App\Contracts;


use App\Services\Booking\DTO\Objects\AnnulateBookingActionDTO;
use App\Services\Booking\DTO\Objects\CheckPaymentStatusActionDTO;
use App\Services\Booking\DTO\Objects\CheckPrintStatusDTO;
use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;
use App\Services\Booking\DTO\Objects\ExternalPrintDTO;
use App\Services\Booking\DTO\Objects\FindRoomsActionDTO;
use App\Services\Booking\DTO\Objects\MakeBookingActionDTO;
use App\Services\Booking\DTO\Objects\PaymentDTO;
use App\Services\Booking\DTO\Objects\PaysystemCollectionDTO;
use App\Services\Booking\DTO\Objects\PrintActionDTO;
use App\Services\Booking\DTO\Objects\RoomCollectionDTO;
use App\Services\Booking\DTO\Objects\BookingDTO;

interface BookingServiceContract {
    public function paysystems(): PaysystemCollectionDTO;
    public function availableRooms(FindRoomsActionDTO $action): RoomCollectionDTO;
    public function book(MakeBookingActionDTO $action): BookingDTO;
    public function paymentStatus(CheckPaymentStatusActionDTO $dto): PaymentDTO;
    public function print(PrintActionDTO $dto): ExternalPrintDTO;
    public function printStatus(CheckPrintStatusDTO $dto): ExternalPrintDTO;
    public function annulateBooking(AnnulateBookingActionDTO $dto): ExternalAnnulateDTO;
}
