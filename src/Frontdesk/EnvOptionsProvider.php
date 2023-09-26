<?php


namespace GettSleep\Frontdesk;

class EnvOptionsProvider implements OptionsProvider {

    public function __construct()
    {
    }

    public function getToken(): string {
        return env('FRONTDESK_TOKEN');
    }

    public function getReservationToken(): string {
        return env('FRONTDESK_RESERVATION_TOKEN');
    }

    public function getUrl(): string {
        return env('FRONTDESK_URL');
    }
}
