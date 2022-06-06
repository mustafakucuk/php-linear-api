<?php

namespace LinearApi\Api;

class Cycle extends Base
{
    protected $defines = [
        'list' => 'cycles',
        'get' => 'cycle',
        'create' => [
            'mutation' => 'cycleCreate',
            'variables' => [
                'input' => 'CycleCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'cycleUpdate',
            'variables' => [
                'input' => 'CycleUpdateInput!',
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
