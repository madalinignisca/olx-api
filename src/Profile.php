<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class AccessToken
{
    public $type;
    public $name;
    public $available;
    public $total;
    public $invoice_at;
    public $purchased_at;
    public $starts_at;
    public $expires_at;
    public $expired_at;
    public $in_grace_period;
    public $price;

    public function __construct(
        string $type,
        string $name,
        string $available,
        string $total,
        string $invoice_at,
        string $purchased_at,
        string $starts_at,
        string $expires_at,
        string $expired_at,
        string $in_grace_period,
        string $price
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->available = $available;
        $this->total = $total;
        $this->invoice_at = $invoice_at;
        $this->purchased_at = $purchased_at;
        $this->starts_at = $starts_at;
        $this->expires_at = $expires_at;
        $this->expired_at = $expired_at;
        $this->in_grace_period = $in_grace_period;
        $this->price = $price;
    }
}
