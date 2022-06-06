## Comments

```php
$nodes = [
    'id',
    'body',
    'issue' => [
        'id',
        'title',
    ]
];
```

### Get All Comments

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$comments = $client->comments->list($nodes);

```

### Filter & Limit

```php

require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$args = [
    'first' => 2,
    'filter' => [
        'issue' => [
            'id' => [
                'eq' => '<issue_id>'
            ]
        ],
    ]
];

$comments = $client->comments->list($nodes, $args);
```

### Get Comment

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$comment = $client->comments->get('<comment_id>', $nodes);
```

### Create Comment

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'issueId' => '<issue_id>',
    'body' => 'This is a test comment with API',
];

$comments = $client->comments->create($payload, $nodes);
```

### Update Comment

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'body' => 'This is a test comment with API (Updated)',
];

$comment = $client->comments->update('<comment_id>', $payload, $nodes);

```

### Delete Comment

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$comment = $client->comments->delete('<comment_id>');
```
