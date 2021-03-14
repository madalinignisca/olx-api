<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Image
{
    public function __construct(string $url)
    {
        $this->url = $url;
    }
}
