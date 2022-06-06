<?php

namespace LinearApi\Api;

class Team extends Base
{
    protected $defines = [
        'list' => 'teams',
        'get' => 'team',
        'create' => [
            'mutation' => 'teamCreate',
            'variables' => [
                'input' => 'TeamCreateInput!',
                'copySettingsFromTeamId' => 'String',
            ],
        ],
        'update' => [
            'mutation' => 'teamUpdate',
            'variables' => [
                'input' => 'TeamUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'teamDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
