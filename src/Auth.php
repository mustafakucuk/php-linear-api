<?php

namespace LinearApi;

use GuzzleHttp\Client;

class Auth
{

    const API_URL = 'https://api.linear.app/oauth/';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::API_URL,
        ]);
    }

    public function get_access_token($data)
    {

        $required_params = [
            'code',
            'redirect_uri',
            'client_id',
            'client_secret',
        ];

        foreach ($required_params as $param) {
            if (!isset($data[$param]) || !$data[$param]) {
                throw new \InvalidArgumentException(
                    'Missing the required parameter $data[\'' . $param . '\'] when calling '
                );
            }
        }

        $response = $this->client->post('token', [
            'form_params' => [
                'code' => $data['code'],
                'redirect_uri' => $data['redirect_uri'],
                'client_id' => $data['client_id'],
                'client_secret' => $data['client_secret'],
                'grant_type' => 'authorization_code',
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function revoke($access_token)
    {
        $response = $this->client->post('revoke', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'access_token' => $access_token,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
