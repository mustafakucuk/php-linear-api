## Teams

```php
$nodes = [
    'id',
    'name',
    'description',
    'icon',
    'color',
    'createdAt',
    'members' => [
        'nodes' => [
            'id',
            'name'
        ]
    ],
    'projects' => [
        'nodes' => [
            'id',
            'name'
        ]
    ],
    'cycles' => [
        'nodes' => [
            'id',
            'name'
        ]
    ],
];
```

### Get All Teams

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');


$teams = $client->teams->list($nodes);
```

### Filter & Limit

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

// Filter the teams by it name and priority of the issues it has
$args = [
    'first' => 1,
    'filter' => [
        'name' => [
            'contains' => 'Test',
        ],
        'issues' => [
            'priority' => [
                'eq' => 2, // equal to "High"
            ],
        ]
    ],
];

$teams = $client->teams->list($nodes, $args);
```

### Get Team

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$team = $client->teams->get('<team_id>', $nodes);
```

### Create Team

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'Test Team With API',
    'description' => 'This is a test team with API',
    'color' => '#ff0000',
];

$team = $client->teams->create($payload, $nodes);
```

### Update Team

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'Test Team With API (Updated)',
    'description' => 'This is a test team with API (Updated)',
    'color' => '#fff',
];

$team = $client->teams->update('<team_id>', $payload, $nodes);
```

### Delete Team

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$team = $client->teams->delete('<team_id>');
```
