# PHP Linear API

A simple Object Oriented wrapper for Linear API, written with PHP.

---

**NOTE**

- You should take a look Linear GraphQL API Schema for all nodes and fields.
  https://github.com/linear/linear/blob/master/packages/sdk/src/schema.graphql

- You must authenticate for all API calls.

- Some apis not support some features like (list, get, update, delete)

- You can follow get api key [Linear](https://developers.linear.app/docs/graphql/working-with-the-graphql-api#personal-api-keys)

---

## Installation

You can install this package with composer:

```
composer require mustafakucuk/php-linear-api
```

## Documentation

You can read the documentation of this package go to `docs` directory.

## Basic Usage

```php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<your-api-key>');

$issues = $client->issues->list([
    'id',
    'title'
]);
```

