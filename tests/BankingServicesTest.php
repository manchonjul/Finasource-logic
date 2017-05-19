<?php

namespace Flinks;

use Flinks\BankingServices\Model\AccountsDetailResponse;
use Flinks\BankingServices\Model\AccountsSummaryResponse;
use Flinks\BankingServices\Model\ChallengeResponse;
use Flinks\BankingServices\Model\LoggedInResponse;
use Flinks\BankingServices\Model\Login;

use PHPUnit\Framework\TestCase;

class BankingServicesTest extends TestCase
{
	private static $config;
	private static $customer_id;

	/**
	 * Setup before running any test cases
	 */
	public static function setUpBeforeClass()
	{
		static::$config = ConfigReader::read();
		define('CUSTOMER_ID', static::$config['CustomerId']);
		define('MODEL_NS', '\\Flinks\\BankingServices\\Model\\');
	}

	/**
	 * Setup before running each test case
	 */
	public function setUp()
	{

	}

	/**
	 * Clean up after running each test case
	 */
	public function tearDown()
	{

	}

	/**
	 * Clean up after running all test cases
	 */
	public static function tearDownAfterClass()
	{

	}

	public function testLogger()
	{
		Client::getLogger()->addInfo('Testing on ' . date('Y-m-d H:i:s'));
	}

	public function testDependencies()
	{
		$this->assertTrue(function_exists('curl_version'));
	}

	/**
	 * Test case for authorize
	 *
	 * .
	 *
	 */
	public function testAll()
	{
		static $already_run = false;

		if($already_run)
		{
			return;
		}

		foreach(static::$config['TestLogins'] as $institution => $logins)
		{
			foreach($logins as $i => $data)
			{
				$client = new Client(CUSTOMER_ID);

				$first_response = $client->authorizeWithCredentials($institution, $data['Username'], $data['Password'], true);

				$this->assertNotInstanceOf(MODEL_NS . 'ClientErrorResponse', $first_response);
				$this->assertNotInstanceOf(MODEL_NS . 'ServerErrorResponse', $first_response);

				if($first_response instanceof ChallengeResponse)
				{
					$logged_in_response =
						$client->authorizeWithCredentials(
							$institution,
							$data['Username'],
							$data['Password'],
							true,
							new \ArrayObject($data['SecurityResponses'])
						);
				}
				else
				{
					$logged_in_response = $first_response;
				}

				$this->assertNotEmpty($logged_in_response->getRequestId());

				$this->assertNotEmpty($logged_in_response->getLogin());
				$this->assertInstanceOf(MODEL_NS . 'Login', $logged_in_response->getLogin());
				$this->assertNotEmpty($logged_in_response->getLogin()->getId());

				$summary_response = $client->getAccountsSummary(false);

				$this->assertInstanceOf(MODEL_NS . 'AccountsSummaryResponse', $summary_response);

				$accounts = $summary_response->getAccounts();

				$this->assertNotNull($accounts);
				$this->assertNotEmpty($accounts);

				$detail_response = $client->getAccountsDetail(false);

				$this->assertInstanceOf(MODEL_NS . 'AccountsDetailResponse', $detail_response);

				$accounts = $detail_response->getAccounts();

				$this->assertNotNull($accounts);
				$this->assertNotEmpty($accounts);

				foreach($accounts as $account)
				{
					$this->assertInstanceOf(MODEL_NS.'AccountWithDetails', $account);

					$this->assertNotEmpty($account->getAccountNumber());
					$this->assertNotEmpty($account->getTransactions());

					foreach($account->getTransactions() as $transaction)
					{
						$this->assertNotEmpty($transaction->getDescription());
						break;
					}
					break;
				}

				static::$config['TestLogins'][$institution][$i] = $data;
			}
		}

		$already_run = true;
	}
}
