<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Attribute
{
    public $urn;
    public $value;

    public function __construct(string $urn, string $value)
    {
        $this->urn = $urn;
        $this->value = $value;
    }
}
