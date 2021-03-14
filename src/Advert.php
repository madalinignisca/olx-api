<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Advert
{
    public $title;
    public $description;
    public $site_urn;
    public $category_urn;
    public $contact;
    public $price;
    public $location;
    public $images;
    public $movie_url;

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

    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    public function setMovieUrl(string $url)
    {
        $this->movie_url = $url;
    }

    public function addAttribute(Attribute $attribute)
    {
        $this->attributes[] = $attribute;
    }

    public function setCustomFields(CustomFields $fields)
    {
        $this->custom_fields = $fields;
    }
}
