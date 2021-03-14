<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

use GuzzleHttp\Client;

/**
 * Talks with taxonomies in Olx
 */
class Taxonomy
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getTaxonomies(string $site = null, string $category = null)
    {
        // Not sure if categories are 100% accurate between sites
        $path = $site;

        if ($category) {
            $path .= '/' . $category;
        }

        try {
            $response = $this->client->request('GET', $path);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return json_decode($response->getBody());
    }
}
