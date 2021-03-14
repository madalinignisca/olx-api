<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Advert
{
    // declared properties are required by Olx
    // optionals can be set on the fly with corresponding methods
    public $title;
    public $description;
    public $site_urn;
    public $category_urn;
    public $contact;
    public $price;
    public $location;
    public $images;
    public $attributes;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function setSite(string $urn)
    {
        $this->site_urn = $urn;
    }

    public function setCategory(Attribute $category)
    {
        $this->category_urn = $category->code; // eg. urn:concept:apartments-for-sale
    }

    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function setPrice(Price $price)
    {
        $this->price = $price;
    }

    // otodom
    public function setRentPrice(Price $price)
    {
        $this->rent_price = $price;
    }

    // otodom
    public function setDepositPrice(Price $price)
    {
        $this->deposit_price = $price;
    }

    public function setMarket(Market $market)
    {
        $this->market = $market->getType;
    }

    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    public function setMovieUrl(string $url)
    {
        $this->movie_url = $url;
    }

    public function addAttributes(AttributeCollection $attributes)
    {
        $this->attributes = $attributes;
    }

    public function setCustomFields(CustomFields $fields)
    {
        $this->custom_fields = $fields;
    }

    public function setParent(Investment $parent)
    {
        $this->parent_uuid = $parent->getUuid();
    }

    public function setImages(ImageCollection $images)
    {
        $this->images = $images->getImages();
    }
}
