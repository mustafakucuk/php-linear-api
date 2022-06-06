## Views

```php
$nodes = [
    'id',
    'name',
    'description',
    'shared',
    'color',
    'createdAt',
    'updatedAt',
    'filterData',
    'team' => [
        'id',
        'name',
    ]
];
```

### Get All Views

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$views = $client->views->list($nodes);
```

### Filter & Limit

This api not support filter yet.

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

// Limit to 10 views
$args = [
    'first' => 10,
];

$views = $client->views->list($nodes, $args);
```

### Get View

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$view = $client->views->get('<view_id>', $nodes);
```

### Create Custom View

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

// If want create basic view
$payload = [
    'name' => 'Custom View Created by API',
    'description' => 'This is a custom view created by API',
    'color' => '#ff0000',
];


// If want create view with filter

$payload = [
    'name' => 'Custom View Created by API',
    'description' => 'This is a custom view created by API',
    'color' => '#ff0000',
    'filterData' => [
        'and' => [
            // filter by has labels (Example label name: test `bug`)
            [
                'labels' => [
                    'and' => [[
                        'name' => [
                            'eq' => 'bug'
                        ]
                    ]]
                ]
            ],
            // filter by has priorities
            [
                'priority' => [
                    'in' => [4, 3]
                ],
            ],
            // filter by has states
            [
                'state' => [
                    'name' => [
                        'in' => ['in progress']
                    ]
                ]
            ]
        ]
    ]
];

$view = $client->views->create($payload, $nodes);
```

### Update View

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');


$payload = [
    'name' => 'Custom View Created by API (Updated)',
    'description' => 'This is a custom view created by API (Updated)',
    'color' => '#fff',
    'filterData' => [
        'and' => [
            [
                'priority' => [
                    'in' => [4, 3, 2, 1, 0]
                ],
            ],
        ]
    ]
];

$view = $client->views->update('<view_id>', $payload, $nodes);
```

### Delete View

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$view = $client->views->delete('<view_id>');
```
