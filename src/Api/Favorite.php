<?php

namespace LinearApi\Api;

class Favorite extends Base
{
    protected $defines = [
        'list' => 'favorites',
        'get' => 'favorite',
        'create' => [
            'mutation' => 'favoriteCreate',
            'variables' => [
                'input' => 'FavoriteCreateInput!',
            ],
        ],
        'update' => [
            'mutation' => 'favoriteUpdate',
            'variables' => [
                'input' => 'FavoriteUpdateInput!',
            ],
        ],
        'delete' => 'favoriteDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
