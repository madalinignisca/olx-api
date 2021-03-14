<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Price
{
    public $value;
    public $currency;

    /**
     * @param int|float $value
     * @param string $currency
     */
    public function __construct($value, string $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }
}
