<?php

namespace LinearApi\Api;

class View extends Base
{
    protected $defines = [
        'list' => 'customViews',
        'get' => 'customView',
        'create' => [
            'mutation' => 'customViewCreate',
            'variables' => [
                'input' => 'CustomViewCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'customViewUpdate',
            'variables' => [
                'input' => 'CustomViewUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'customViewDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
