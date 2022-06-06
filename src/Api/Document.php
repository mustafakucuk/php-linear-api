<?php

namespace LinearApi\Api;

class Document extends Base
{
    protected $defines = [
        'list' => 'documents',
        'get' => 'document',
        'create' => [
            'mutation' => 'documentCreate',
            'variables' => [
                'input' => 'DocumentCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'documentUpdate',
            'variables' => [
                'input' => 'DocumentUpdateInput!',
                'id' => 'String!',
            ],
        ],
        'delete' => 'documentDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
