<?php

namespace LinearApi\Api;

class User extends Base
{
    protected $defines = [
        'list' => 'users',
        'get' => 'user',
        'create' => false,
        'update' => [
            'mutation' => 'userUpdate',
            'variables' => [
                'input' => 'UpdateUserInput!',
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
