## Issues

```php
$nodes = [
    'id',
    'title',
    'description',
    'priority',
    'priorityLabel',
    'labels' => [
        'nodes' => [
            'id',
            'name',
        ],
    ]
];
```

### Get All Issues

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$issues = $client->issues->list($nodes);

```

### Filter & Limit Issues

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$args = [
    // Get first 10 issues
    'first' => 10,

    // Filter the issues
    'filter' => [
        // Get issues with title containing 'Test'
        'title' => [
            'contains' => 'Test'
        ],
        // Get issues with priority [1,2]
        'priority' => [
            'in' => [1, 2]
        ],
        // Get issues with label 'Bug'
        'labels' => [
            'name' => [
                'eq' => 'Bug'
            ]
        ]
    ]
];

$issues = $client->issues->list($nodes, $args);

```

### Get Issue

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$issue = $client->issues->get('<issue_id>', $nodes);
```

### Create Issue

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'title' => 'Test Issue With API',
    'description' => 'This is a test issue',
    'priority' => 1,
    'teamId' => '<team_id>',
    'labelIds' => [
        '<label_id>'
    ]
];

$issue = $client->issues->create($payload, $nodes);
```

### Update Issue

```php

require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'title' => 'Test Issue With API (Updated)',
    'description' => 'This is a test issue (Updated)',
    'priority' => 2,
];

$issue = $client->issues->update('<issue_id>', $payload, $nodes);
```

### Delete Issue

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$client->issues->delete('<issue_id>');
```
