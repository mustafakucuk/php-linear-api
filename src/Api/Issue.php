<?php

namespace LinearApi\Api;

class Issue extends Base
{
    protected $defines = [
        'list' => 'issues',
        'get' => 'issue',
        'create' => [
            'mutation' => 'issueCreate',
            'variables' => [
                'input' => 'IssueCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'issueUpdate',
            'variables' => [
                'input' => 'IssueUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'issueDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'title',
        ];
    }
}
