<?php

namespace LinearApi\Api;

class ApiKey extends Base
{
    protected $defines = [
        'list' => 'apiKeys',
        'get' => 'apiKey',
        'create' => [
            'mutation' => 'apiKeyCreate',
            'variables' => [
                'input' => 'ApiKeyCreateInput!',
            ],
        ],
        'update' => false,
        'delete' => 'apiKeyDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'label',
        ];
    }
}
