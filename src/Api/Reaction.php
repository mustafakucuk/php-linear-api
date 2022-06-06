<?php

namespace LinearApi\Api;

class Reaction extends Base
{
    protected $defines = [
        'list' => 'reactions',
        'get' => 'reaction',
        'create' => [
            'mutation' => 'reactionCreate',
            'variables' => [
                'input' => 'ReactionCreateInput!',
            ],
        ],
        'update' => false,
        'delete' => 'reactionDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
        ];
    }
}
