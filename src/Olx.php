<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class Olx
{
    protected $client;

    /**
     * Create a new Olx Instance
     */
    public function __construct(
        string $apiKey,
        string $userAgent,
        string $clientId,
        string $clientSecret
    ) {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.olxgroup.com',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'headers' => [
                'Accept' => 'application/json',
                'X-API-KEY' => $apiKey,
                'User-Agent' => $userAgent
                ]
        ]);

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Get Authorization URL
     *
     * Given the portal site and user identification id
     * will return a code mandatory to be used within 60s
     *
     * @param string $portalSite
     * @param string $userId
     * @return string
     */
    public function authorizationUrl(string $portalSite, string $userId): string
    {
        return "https://" . $portalSite
            . "mercury/authorization/?response_type=code&client_id="
            . $this->clientId
            . "&state=" . $userId;
    }

    /**
     * Get access token
     *
     * Authorization code TTL
     * Don't forget that the authorization code only lasts 60 seconds.
     * You must request the access token within this timeframe.
     * Otherwise, the user will have to grant your app permissions again.
     * https://developer.olxgroup.com/docs/authorization-flow#3-exchange-code-for-an-access-token
     *
     * @param string $authorizationCode
     * @return AccessToken
     */
    public function getAccessToken(string $authorizationCode)
    {
        try {
            $response = $this->client->request('POST', '/oauth/v1/token', [
                'headers' => [
                    'Authorization' => 'Basic ' . $this->calculateAppAuthorization(),
                ],
                'json' => [
                    "grant_type" => "authorization_code",
                    "code" => $authorizationCode,
                ]
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return new AccessToken(...array_values($body));
    }

    public function refreshAccessToken(string $refresh_token)
    {
        try {
            $response = $this->client->request('POST', '/oauth/v1/token', [
                'headers' => [
                    'Authorization' => 'Basic ' . $this->calculateAppAuthorization(),
                ],
                'json' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token,
                ]
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return new AccessToken(...array_values($body));
    }

    public function calculateAppAuthorization()
    {
        return 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret);
    }

    // PROFILE
    public function getProfilePackages(string $token)
    {
        try {
            $response = $this->client->request('GET', '/profile/v1/packages', [
                'headers' => [
                    "Authorization" => 'Bearer ' . $token,
                ]
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return new AccessToken(...current(array_values(($body->data))));
    }

    /**
     * Posts an advert
     *
     * @param Advert $advert
     * @param string $token
     * @return string
     */
    public function postAdvert(Advert $advert, string $token): string
    {
        try {
            $response = $this->client->request('POST', '/advert/v1', [
                'headers' => [
                    "Authorization" => 'Bearer ' . $token,
                    "Content-Type" => "application/json",
                ],
                'json' => $advert
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return $body->uuid;
    }

    /**
     * Validates an advert
     *
     * @param Advert $advert
     * @param string $token
     * @return string
     */
    public function validateAdvert(Advert $advert, string $token): string
    {
        try {
            $response = $this->client->request('POST', '/advert/v1/validate', [
                'headers' => [
                    "Authorization" => 'Bearer ' . $token,
                    "Content-Type" => "application/json",
                ],
                'json' => $advert
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return $body->message;
    }

    /**
     * Updates an advert
     *
     * @param string $uuid
     * @param Advert $advert
     * @param string $token
     * @return string
     */
    public function updateAdvert(string $uuid, Advert $advert, string $token): string
    {
        try {
            $response = $this->client->request('PUT', '/advert/v1/' . $uuid, [
                'headers' => [
                    "Authorization" => 'Bearer ' . $token,
                    "Content-Type" => "application/json",
                ],
                'json' => $advert
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return $body->message;
    }

    /**
     * Deactivates an advert
     *
     * @param string $uuid
     * @param string $token
     * @return string
     */
    public function deActivateAdvert(string $uuid, string $token)
    {
        try {
            $response = $this->client->request('POST', '/advert/v1/' . $uuid . '/deactivate', [
                'headers' => [
                    "Authorization" => 'Bearer ' . $token,
                    "Content-Type" => "application/json",
                ],
                'json' => $advert
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return $body->message;
    }

    /**
     * Activates an advert
     *
     * @param string $uuid
     * @param string $token
     * @return string
     */
    public function activateAdvert(string $uuid, string $token)
    {
        try {
            $response = $this->client->request('POST', '/advert/v1/' . $uuid . '/activate', [
                'headers' => [
                    "Authorization" => 'Bearer ' . $token,
                    "Content-Type" => "application/json",
                ],
                'json' => $advert
            ]);
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        $body = json_decode($response->getBody());

        return $body->message;
    }
}
