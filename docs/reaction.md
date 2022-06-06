## Reactions

```php
$nodes = [
    'id',
    'emoji',
    'createdAt',
];
```

### Get All Reactions

`list` method not available yet for this api.

### Get Reaction

`get` method not available yet for this api.

### Create Reaction

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$payload = [
    'emoji' => '+1',
    'commentId' => '<comment_id>',
];

$reaction = $client->reactions->create($payload, $nodes);
```

### Delete Reaction

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<api_key>', 'api_key');

$reaction = $client->reactions->delete('<reaction_id>');
```