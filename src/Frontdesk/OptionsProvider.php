<?php


namespace GettSleep\Frontdesk;

interface OptionsProvider
{
    public function getUrl(): string;

    public function getToken(): string;

    public function getReservationToken(): string;
}
