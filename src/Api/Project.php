<?php

namespace LinearApi\Api;

class Project extends Base
{
    protected $defines = [
        'list' => 'projects',
        'get' => 'project',
        'create' => [
            'mutation' => 'projectCreate',
            'variables' => [
                'input' => 'ProjectCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'projectUpdate',
            'variables' => [
                'input' => 'ProjectUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'projectDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
