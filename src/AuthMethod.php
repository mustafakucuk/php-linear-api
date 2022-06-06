<?php

namespace LinearApi;

final class AuthMethod
{
    const API_KEY = 'api_key';

    const OAUTH2 = 'oauth2';

    public static function auth_methods()
    {
        $auths =  [
            self::API_KEY,
            self::OAUTH2,
        ];

        return $auths;
    }

    public static function check($auth_method)
    {
        if (!in_array($auth_method, self::auth_methods())) {
            throw new \Exception('Invalid auth method: ' . $auth_method);
        }
    }
}
