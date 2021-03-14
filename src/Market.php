<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Market
{
    protected $type;

    public function __construct(string $type = 'secondary')
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}
