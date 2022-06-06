## Issue Labels

```php
$nodes = [
    'id',
    'name',
    'color',
    'createdAt',
    'creator' => [
        'id',
        'name',
    ],
    'issues' => [
        'nodes' => [
            'id',
            'title',
        ],
    ]
];
```

### Get All Issue Labels

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$issue_labels = $client->issue_labels->list($nodes);
```

### Filter & Limit

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$args = [
    'first' => 1,
    'filter' => [
        'name' => [
            'contains' => 'test label',
        ]
    ],
];

$issue_labels = $client->issue_labels->list($nodes, $args);
```

### Get Issue Label

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$issue_label = $client->issue_labels->get('<issue_label_id>', $nodes);
```

### Create Issue Label

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'test label with api',
    'description' => 'This is a test label with API',
    'color' => '#ff0000',
    // if you want create a label by team, you need to pass team id
    // 'teamId' => '',
];

$issue_label = $client->issue_labels->create($payload, $nodes);
```

## Update Issue Label

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'test label with api (updated)',
    'description' => 'This is a test label with API (updated)',
    'color' => '#ff0000',
];

$issue_label = $client->issue_labels->update('<issue_label_id>', $payload, $nodes);
```

## Delete Issue Label

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$client->issue_labels->delete('<issue_label_id>');
```
