<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Location
{
    public function __construct(
        float $latitude,
        float $longitute,
        bool $exact = false
    ) {
        $this->lat = $latitude;
        $this->lon = $longitute;
        $this->exact = $exact;
    }
}
