<?php

namespace LinearApi\Api;

class ProjectMilestone extends Base
{
    protected $defines = [
        'list' => 'projectMilestones',
        'get' => 'projectMilestone',
        'create' => [
            'mutation' => 'projectMilestoneCreate',
            'variables' => [
                'input' => 'ProjectMilestoneCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'projectMilestoneUpdate',
            'variables' => [
                'input' => 'ProjectMilestoneUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'projectMilestoneDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
