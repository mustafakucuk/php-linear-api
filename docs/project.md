## Projects

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
    'issues' => [
        'nodes' => [
            'id',
            'title',
        ]
    ]
];
```

### Get All Projects

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');


$projects = $client->projects->list($nodes);
```

### Filter & Limit

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

// Filter the projects by it name and priority of the issues it has
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

$projects = $client->projects->list($nodes, $args);
```

### Get Project

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$project = $client->projects->get('<project_id>', $nodes);
```

### Create Project

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'Test Project With API',
    'description' => 'This is a test project with API',
    'color' => '#ff0000',
    'teamIds' => ['<team_id>'],
];

$project = $client->projects->create($payload, $nodes);
```

### Update Project

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'Test Project With API (Updated)',
    'description' => 'This is a test project with API (Updated)',
    'color' => '#fff',
];

$project = $client->projects->update('<project_id>', $payload, $nodes);
```

### Delete Project

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$project = $client->projects->delete('<project_id>');
```
