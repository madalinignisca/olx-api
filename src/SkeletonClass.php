<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class Olx
{
    protected $apiKey;
    protected $clientId;
    protected $clientSecret;

    /**
     * Create a new Skeleton Instance
     */
    public function __construct(
        string $apiKey,
        string $clientId,
        string $clientSecret,
        string $userAgent,
        string $portalSite
    ) {
        $this->apiKey = $apiKey;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Get Authorization URL
     *
     * string @portalSite
     * string @userId
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
     */
    public function getToken(string $authorizationCode)
    {
        // http to https://api.olxgroup.com/oauth/v1/token
    }
}
