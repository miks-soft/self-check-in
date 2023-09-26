<?php


namespace GettSleep\Frontdesk\Response;

use GettSleep\Frontdesk\Collection\Rooms;

class FindRoomsResponse extends Response {

    public function __construct(
        protected Rooms $rooms
    ) {
    }

    public function getRooms():Rooms {
        return $this->rooms;
    }
}
