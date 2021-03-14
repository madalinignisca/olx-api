<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Contact
{
    public $name;
    public $phone;
    public $email;
    public $photo;

    public function __construct(string $name, string $phone, string $email, string $photo)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->photo = $photo;
    }
}
