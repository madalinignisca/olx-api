<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Investment
{
    protected $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function getUuid()
    {
        return $this->uuid;
    }
}
