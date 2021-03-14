<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class CustomFields
{
    public function __construct(string $id, string $reference_id = null)
    {
        $this->id = $id;
        if ($reference_id) {
            $this->reference_id = $reference_id;
        }
    }
}
