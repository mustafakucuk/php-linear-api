<?php

namespace LinearApi\Api;

class Emoji extends Base
{
    protected $defines = [
        'list' => 'emojis',
        'get' => 'emoji',
        'create' => [
            'mutation' => 'emojiCreate',
            'variables' => [
                'input' => 'EmojiCreateInput!',
            ],
        ],
        'update' => false,
        'delete' => 'emojiDelete',
    ];

    protected function default_nodes()
    {
        return [
            'id',
            'name',
        ];
    }
}
