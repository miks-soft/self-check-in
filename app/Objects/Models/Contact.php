<?php


namespace App\Objects\Models;

use Illuminate\Support\Carbon;

class Contact {
    protected ?string $id = null;
    protected string $name;
    protected string $last_name;
    protected string $email;
    protected string $phone;
    protected Carbon $dateOfBirth;

    public function __construct(
        string $name,
        string $last_name,
        string $email,
        string $phone,
        Carbon $dateOfBirth
    ){
        $this->name = $name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return Carbon
     */
    public function getDateOfBirth(): Carbon
    {
        return $this->dateOfBirth;
    }
}
