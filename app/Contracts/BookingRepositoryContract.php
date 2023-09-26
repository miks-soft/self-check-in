<?php


namespace App\Contracts;


use App\Objects\Models\BookingAggregate;
use App\Models\Booking;
use App\Objects\Models\Paysystem;
use TCG\Voyager\Translator\Collection;
use TCG\Voyager\Translator;

interface BookingRepositoryContract {
    public function saveBooking(BookingAggregate $booking): Booking;
    public function roomsById(array $roomIds): Collection;
    public function roomsByExternal(array $roomsExternalId): Collection;
    public function paysystemsAll(): Collection;
    public function paysystemById(string $id): Translator;
    public function bookingById(string $id): Booking;
    public function linkExternalBooking(Booking $booking, string $externalId): Booking;
    }
