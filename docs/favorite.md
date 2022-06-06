## Favorites

The user's favorites.

```php
$nodes = [
    'id',
    'createdAt',
    'cycle' => [
        'id',
        'name',
    ],
    'project' => [
        'id',
        'name',
    ],
    'issue' => [
        'id',
        'title',
    ],
];
```

### Get All Favorites

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$favorites = $client->favorites->list($nodes);
```

### Filter

This api not support filter yet.

### Get Favorite

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$favorite = $client->favorites->get('<favorite_id>', $nodes);
```

### Create Favorite

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

// if you want to create a favorite for a cycle
$payload = [
    'cycleId' => '<cycle_id>'
];

// if you want to create a favorite for a document
$payload = [
    'documentId' => '<document_id>'
];

// if you want to create a favorite for a issue
$payload = [
    'issueId' => '<issue_id>'
];

$favorite = $client->favorites->create($payload);
```

### Delete Favorite

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$favorite = $client->favorites->delete('<favorite_id>');
```