<?php

namespace LinearApi\Api;

class Comment extends Base
{
    protected $defines = [
        'list' => 'comments',
        'get' => 'comment',
        'create' => [
            'mutation' => 'commentCreate',
            'variables' => [
                'input' => 'CommentCreateInput!',
            ]
        ],
        'update' => [
            'mutation' => 'commentUpdate',
            'variables' => [
                'input' => 'CommentUpdateInput!',
                'id' => 'String!',
            ]
        ],
        'delete' => 'commentDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'body',
        ];
    }
}
