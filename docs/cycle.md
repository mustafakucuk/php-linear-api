## Cycles

```php
$nodes = [
    'id',
    'name',
    'startsAt',
    'endsAt',
];
```

### Get All Cycles

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$cycles = $client->cycles->list($nodes);
```

### Filter & Limit

```php

require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$args = [
    'filter' => [
        'startsAt' => [
            'gt' => '2022-07-01',
        ],
    ]
];

$cycles = $client->cycles->list($nodes, $args);
```

### Get Cycle

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$cycle = $client->cycles->get('<cycle_id>', $nodes);
```

### Create Cycle

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'Cycle Test',
    'startsAt' => '2022-07-01',
    'endsAt' => '2022-07-31',
    'teamId' => '<team_id>',
];

$cycle = $client->cycles->create($payload, $nodes);
```

### Update Cycle

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'name' => 'Cycle Test (Updated)',
    'startsAt' => '2022-07-03',
    'endsAt' => '2022-07-31',
];

$cycle = $client->cycles->update('<cycle_id>', $payload, $nodes);
```

### Delete Cycle

Delete action is not available in the API.
