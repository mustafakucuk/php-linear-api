<?php

namespace LinearApi\Api;

class Organization extends Base
{
    protected $defines = [
        'list' => 'organization',
        'get' => 'organization',
        'create' => false,
        'update' => [
            'mutation' => 'organizationUpdate',
            'variables' => [
                'input' => 'UpdateOrganizationInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => false,
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
