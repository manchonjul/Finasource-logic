This is a work in progress of a pre-monetised setup of a pfm sort of app that Canadian Bank users will use and those running the code will make money off of various affiliate marketing techniques and advanced automated advertiseing techniues built into the code.
Thanks to the wonderful people at flinks, I have been able to code this from their solid api.
It is not complete yet, but when it is you can simply install by following the offial flinks api installion directions corresponding with this project by reading below.
I have isntalled all necessary integrations so you just have to use git to clone this repo or download the ZIP and cd into 'Finasource-logic' then follow the directions below:


# Using the Flinks PHP SDK
## Installation
### 1. Add files to your project
Copy the contents of the .zip file to your PHP project. It should be in its own directory (e.g. `Flinks`) so that the
`config.php` file is at the top level (e.g. `Flinks/config.php`).

### 2. Run the unit tests
#### *nix
```
cd /path/to/Flinks
vendor/bin/phpunit
```

#### Windows
```
cd \path\to\Flinks
vendor\bin\phpunit.bat
```

## Complete usage example
```php
<?php

// Get the Flinks autoloader
require_once '/path/to/Flinks/vendor/autoload.php';

// Set up some aliases to make code more readable
use Flinks\BankingServices\Model\ClientErrorResponse;
use Flinks\BankingServices\Model\LoggedInResponse;
use Flinks\BankingServices\Model\ServerErrorResponse;
use Flinks\Client;
use Flinks\ConfigReader;
use Flinks\BankingServices\Model\ChallengeResponse;
use Flinks\BankingServices\Model\ReauthorizeResponse;

// Define your customer ID
define('CUSTOMER_ID', ConfigReader::read()['CustomerId']);

// Initialize the client
$client = new Client(CUSTOMER_ID);

// Configure some dummy data
$institution = 'Desjardins';
$username    = 'user';
$password    = 'pass';

// Try out our credentials
$authRes = $client->authorizeWithCredentials($institution, $username, $password);

// Credentials didn't work!
if($authRes instanceof ReauthorizeResponse)
{
	// tell the user her credentials failed
}
else if($authRes instanceof ClientErrorResponse)
{
	// get errors from $authRes->getValidationDetails()
}
else if($authRes instanceof ServerErrorResponse)
{
	// show an error screen
}
else
{
	// Security challenges received
	if($authRes instanceof ChallengeResponse)
	{
		// note: access challenges via $authRes->getSecurityChallenges();

		$responses = new \ArrayObject(
			[
				'challenge text' => 'response text',
			]
		);

		$loggedInRes = $client->authorizeWithCredentials($institution, $username, $password, true, $responses);
	}

	// Logged in!
	else if($authRes instanceof LoggedInResponse)
	{
		$loggedInRes = $authRes;
	}

	// Something unexpected happened...
	else
	{
		throw new \Exception('Unhandled response');
	}

	// The client automatically saved our RequestId, so now we can get some data!
	$detailsRes = $client->getAccountsDetail(true, true);

	if($detailsRes instanceof ReauthorizeResponse)
	{
		// authorization expired! log in again
	}
	else
	{
		// do something with our data
	}
}
```

## Step-by-step usage
This is a breakdown of how each part of the example works.
### 1. Bootstrap the SDK
Include the Flinks autoloader:
```php
require_once '/path/to/Flinks/vendor/autoload.php';
```
**Troubleshooting note:** because the Flinks SDK is currently distributed outside of the Packagist ecosystem, it's possible
that the autoloader will conflict with other libraries in your project. The minimize the risk of a conflict, be sure to
require the autoloader _only_ in the file(s) that will be using it.

### 2. Authorize
All usage of the Flinks API begins with authorization. When completed, this will return a `LoggedInResponse`. For
_any_ request after the first one, Flinks requires a `RequestId` to continue your session.

The PHP SDK will retrieve and reuse this `RequestId` for you. If you plan to pause the workflow and return later,
you'll need to retrieve the `RequestId`, save it somewhere (cookie, database, etc.) and then add it to the constructor
of the `Client` class (example: `new Client($customer_id, $request_id)`).

Now let's look at the first call to the API.

```php
// Try out our credentials
$authRes = $client->authorizeWithCredentials($institution, $username, $password);
```

That's it!

### 3. Get account details
Once the client has authenticated (or you've provided `$request_id` as the second parameter of the constructor),
you'll be able to make data calls.

```php
$detailsRes = $client->getAccountsDetail(true, true);

if($detailsRes instanceof ReauthorizeResponse)
{
    // authorization expired! log in again
}
else
{
    // do something with our data
}
```

### 4. Use account details
```php
foreach ($detailRes->getTransactions() as $transaction)
{
    // do something
}
```
