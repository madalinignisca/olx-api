<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Location
{
    public function __construct(
        float $latitude,
        float $longitude,
        bool $exact = false,
        string $postal_code = null
    ) {
        $this->lat = $latitude;
        $this->lon = $longitude;
        $this->exact = $exact;
        if ($postal_code) {
            $this->postal_code = $postal_code;
        }
    }
}
