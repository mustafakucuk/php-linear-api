## Documents

Documents associated with the project.

```php
$nodes = [
    'id',
    'title',
    'content',
    'createdAt',
    'updatedAt',
    'creator' => [
        'id',
        'name',
    ],
    'project' => [
        'id',
        'name',
    ],
];
```

### Get All Documents

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$documents = $client->documents->list($nodes);
```

### Filter & Limit

This api not support filter yet.

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$args = [
    'first' => 10
];


$documents = $client->documents->list($nodes, $args);
```

### Get Document

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$document = $client->documents->get('<document_id>', $nodes);
```

### Create Document

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'title' => 'Test Document With API',
    'content' => 'This is a test document with API',
    'color' => '#ff0000',
    'projectId' => '<project_id>',
];

$document = $client->documents->create($payload, $nodes);
```

### Update Document

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'title' => 'Test Document With API (Updated)',
    'content' => 'This is a test document with API (Updated)',
    'color' => '#fff',
];

$document = $client->documents->update('<document_id>', $payload, $nodes);
```

### Delete Document

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$client->documents->delete('<document_id>');
```
