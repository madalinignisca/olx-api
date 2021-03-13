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
        string $clientId,
        string $clientSecret,
        string $userAgent
    ) {
        $authorization = 'Basic ' . base64_encode($clientId . ':' . $clientSecret);

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.olxgroup.com',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $authorization,
                'X-API-KEY' => $apiKey,
                'User-Agent' => $userAgent
                ]
        ]);
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

    // PROFILE
    public function getProfilePackages(string $token_type, string $access_token)
    {
        try {
            $response = $this->client->request('GET', '/profile/v1/packages', [
                'headers' => [
                    "Authorization" => $token_type . ' ' . $access_token,
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
}
