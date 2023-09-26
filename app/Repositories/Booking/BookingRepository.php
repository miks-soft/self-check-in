<?php


namespace App\Repositories\Booking;


use App\Contracts\BookingRepositoryContract;
use App\Objects\Factories\PaysystemFactory;
use App\Objects\Models\BookingAggregate;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Paysystem;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Translator;
use TCG\Voyager\Translator\Collection;

class BookingRepository implements BookingRepositoryContract {
    public function saveBooking(BookingAggregate $booking): Booking {
        $book = new Booking;

        DB::transaction(function () use (&$book, $booking){
            $book->contact()->associate(Contact::create([
                'name' => $booking->getContact()->getName(),
                'last_name' => $booking->getContact()->getLastName(),
                'email' => $booking->getContact()->getEmail(),
                'phone' => $booking->getContact()->getPhone(),
                'date_of_birth' => $booking->getContact()->getDateOfBirth()
            ]));
            $book->paysystem()->associate(Paysystem::findOrFail($booking->getPaysystem()->getId()));

            $book->save();

            foreach ($booking->getRooms() as $room) {
                /**@var \App\Objects\Models\Room $room */
                $book->rooms()->attach(Room::findOrFail($room->getId()), ['count' => $room->getCount(), 'price' => $room->getPrice(), 'date_in' => $room->getInterval()->dateIn(), 'date_out' => $room->getInterval()->dateOut()]);
            }
        });

        return $book;
    }

    public function roomsByExternal(array $roomsExternalId): Collection
    {
        $rooms = Room::withTranslation()->with(['category', 'features', 'room_type'])->whereIn('fd24_id', $roomsExternalId)->get();
        $rooms->transform(function ($room){
            $room->room_type = $room->room_type ? $room->room_type->translate() : $room->room_type;
            $room->category = $room->category ? $room->category->translate() : $room->category;
            $room->features = $room->features ? $room->features->translate() : $room->features;
            return $room;
        });

        return $rooms->translate();
    }

    public function roomsById(array $roomIds): Collection
    {
        $rooms = Room::withTranslation()->with(['category', 'features', 'room_type'])->findMany($roomIds);
        $rooms->transform(function ($room){
            $room->room_type = $room->room_type ? $room->room_type->translate() : $room->room_type;
            $room->category = $room->category ? $room->category->translate() : $room->category;
            $room->features = $room->features ? $room->features->translate() : $room->features;
            return $room;
        });

        return $rooms->translate();
    }

    public function paysystemsAll(): Collection {
        return Paysystem::withTranslation()->get()->translate();
    }

    public function bookingById(string $id): Booking {
        return Booking::findOrFail($id);
    }

    public function linkExternalBooking(Booking $booking, string $externalId): Booking
    {
        $booking->fd24_id = $externalId;
        $booking->saveOrFail();

        return $booking;
    }

    public function paysystemById(string $id): Translator
    {
        return Paysystem::withTranslation()->where('id', $id)->firstOrFail()->translate();
    }
}
