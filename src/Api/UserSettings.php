<?php

namespace LinearApi\Api;

class UserSettings extends Base
{
    protected $defines = [
        'list' => 'userSettings',
        'get' => 'userSettings',
        'create' => false,
        'update' => [
            'mutation' => 'userSettingsUpdate',
            'variables' => [
                'input' => 'UserSettingsUpdateInput!',
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
