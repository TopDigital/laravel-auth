<?php

namespace TopDigital\Auth\Helpers;

use DateTime;

use TopDigital\Auth\Models\User;

class AuthTokenHelper
{

    public static function createToken(User $user) : array
    {
        $token = $user->createToken('api');

        return [
            'token_type' => 'Bearer',
            'expires_in' => $token->token->expires_at->getTimestamp() - (new DateTime())->getTimestamp(),
            'access_token' => $token->accessToken
        ];
    }
}
