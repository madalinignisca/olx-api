<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

use GuzzleHttp\Client;
use GuzzleHttp\Request;

class Advert
{
    protected $client;
    protected $request;
    protected $category_urn;

    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->request = new Request('POST', '/advert/v1', [
            'headers' => [
                'Authorization' => $token,
            ]
        ]);
    }

    public function setSiteUrn(string $urn)
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

    public function publish()
    {
        try {
            $response = $this->send($this->request, [
                'body' => $data,
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
    }
}
