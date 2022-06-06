## Authentication

You can use two way for auth.

#### Option 1. API Key

You can create api key on [API settings](https://linear.app/settings/api).

```` php
require_once 'vendor/autoload.php';

use LinearApi\Client;

$client = new Client('<your_api_key>', 'api_key');

````

#### Option 2. OAuth 2

> Linear supports OAuth2 authentication, which is recommended if you're building applications to integrate with Linear.

You can follow for some details about [Linear OAuth2](https://developers.linear.app/docs/oauth/authentication) auth way.

````php
require_once 'vendor/autoload.php';

use LinearApi\Client;
use LinearApi\Auth;

$auth = new Auth();

$access_token = $auth->get_access_token([
    'code' => '<code>',
    'redirect_uri' => '<your_redirect_uri>',
    'client_id' => '<your_client_id>',
    'client_secret' => '<your_client_secret>',
]);

$client = new Client('<access_token>', 'oauth2');

````

##### Revoke an Access Token

````php
require_once 'vendor/autoload.php';

use LinearApi\Auth;

$auth = new Auth();

$auth->revoke('<access_token>');
````