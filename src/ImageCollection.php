<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class ImageCollection
{
    protected $collection = [];

    public function addImage(Image $image)
    {
        $this->collection[] = $image;
    }

    public function getImages()
    {
        return $this->collection;
    }
}
