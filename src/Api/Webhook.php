<?php

namespace LinearApi\Api;

class Webhook extends Base
{
    protected $defines = [
        'list' => 'webhooks',
        'get' => 'webhook',
        'create' => [
            'mutation' => 'webhookCreate',
            'variables' => [
                'input' => 'WebhookCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'webhookUpdate',
            'variables' => [
                'input' => 'WebhookUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => [
            'mutation' => 'webhookDelete',
            'variables' => [
                'id' => 'String!',
            ],
        ],
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'label',
        ];
    }
}
