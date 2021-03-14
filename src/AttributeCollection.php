<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class AttributeCollection
{
    private $collection = [];

    public function addAtrribute(Attribute $attribute)
    {
        $this->collection[] = $attribute;
    }
}
