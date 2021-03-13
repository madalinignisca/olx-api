<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

class AccessToken
{
    public $access_token;
    public $token_type;
    public $refresh_token;
    public $expires_in;
    public $scope;

    public function __construct(
        string $access_token,
        string $token_type,
        string $refresh_token,
        int $expires_in,
        string $scope
    ) {
        $this->access_token = $access_token;
        $this->token_type = $token_type;
        $this->refresh_token = $refresh_token;
        $this->expires_in = $expires_in;
        $this->scope = $scope;
    }
}
