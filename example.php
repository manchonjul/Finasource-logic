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
	$summaryRes = $client->getAccountsSummary();

	if($summaryRes instanceof ReauthorizeResponse)
	{
		// authorization expired! log in again
	}
	else
	{
		// do something with our data
	}
}