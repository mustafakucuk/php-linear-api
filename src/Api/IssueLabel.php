<?php

namespace LinearApi\Api;

class IssueLabel extends Base
{
    protected $defines = [
        'list' => 'issueLabels',
        'get' => 'issueLabel',
        'create' => [
            'mutation' => 'issueLabelCreate',
            'variables' => [
                'input' => 'IssueLabelCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'issueLabelUpdate',
            'variables' => [
                'input' => 'IssueLabelUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'issueLabelDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
