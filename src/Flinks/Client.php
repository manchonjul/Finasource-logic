<?php

namespace Flinks;

use Flinks\BankingServices\Model\AccountsDetailResponse;
use Flinks\BankingServices\Model\AccountsSummaryResponse;
use Flinks\BankingServices\Model\AuthorizeRequest;
use Flinks\BankingServices\Model\ChallengeResponse;
use Flinks\BankingServices\Model\ClientErrorResponse;
use Flinks\BankingServices\Model\ServerErrorResponse;
use Flinks\BankingServices\Model\GetAccountsDetailRequest;
use Flinks\BankingServices\Model\GetAccountsSummaryRequest;
use Flinks\BankingServices\Model\LoggedInResponse;
use Flinks\BankingServices\Model\ReauthorizeResponse;

use Flinks\BankingServices\Resource\BankingServicesV3Resource;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use GuzzleHttp\Client as GuzzleClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Joli\Jane\Runtime\Encoder\RawEncoder;

use Flinks\BankingServices\Normalizer\NormalizerFactory;

use Monolog\Handler\NullHandler;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

use Monolog\Logger;
use Monolog\Handler\LogglyHandler;

class Client
{
	private $customer_id;
	private $request_id;

	public function __construct($customer_id, $request_id = null)
	{
		$this->customer_id = $customer_id;
		$this->request_id  = $request_id;
	}

	/**
	 * @param string            $institution
	 * @param string            $username
	 * @param string            $password
	 * @param bool              $save
	 * @param \ArrayObject|null $security_responses
	 *
	 * @return AccountsSummaryResponse|ChallengeResponse|ClientErrorResponse|ReauthorizeResponse|ServerErrorResponse
	 * @throws \Exception
	 */
	public function authorizeWithCredentials(
		$institution,
		$username,
		$password,
		$save = false,
		\ArrayObject $security_responses = null
	)
	{
		$request = new AuthorizeRequest();
		$request->setInstitution($institution);
		$request->setUsername($username);
		$request->setPassword($password);
		$request->setSave($save);

		if($security_responses != null)
		{
			$request->setSecurityResponses($security_responses);

			if($this->request_id)
			{
				$request->setRequestId($this->request_id);
			}
		}

		var_dump($request);

		try
		{
			$response = static::getResource()->authorize($this->customer_id, $request);
			static::getLogger()->addInfo(get_class($response) . ' for Authorize request');

			if($response instanceof LoggedInResponse || $response instanceof ChallengeResponse)
			{
				$this->request_id = $response->getRequestId();
			}
		}
		catch(\Exception $e)
		{
			static::logException($e, $request);
			$response = null;

			throw $e;
		}

		return $response;
	}

	/**
	 * @param string            $login_id
	 * @param bool              $save
	 * @param \ArrayObject|null $security_responses
	 *
	 * @return ChallengeResponse|ClientErrorResponse|LoggedInResponse|ReauthorizeResponse|ServerErrorResponse|null
	 * @throws \Exception
	 */
	public function authorizeWithLoginId(
		$login_id,
		$save = false,
		\ArrayObject $security_responses = null
	)
	{
		$request = new AuthorizeRequest();
		$request->setLoginId($login_id);
		$request->setSave($save);

		if($security_responses != null)
		{
			$request->setSecurityResponses($security_responses);

			if($this->request_id)
			{
				$request->setRequestId($this->request_id);
			}
		}

		try
		{
			$response = static::getResource()->authorize($this->customer_id, $request);
			static::getLogger()->addInfo(get_class($response) . ' for Authorize request');

			if($response instanceof LoggedInResponse || $response instanceof ChallengeResponse)
			{
				$this->request_id = $response->getRequestId();
			}
		}
		catch(\Exception $e)
		{
			static::logException($e, $request);
			$response = null;

			throw $e;
		}

		return $response;
	}

	/**
	 * @param bool $most_recent
	 *
	 * @return AccountsSummaryResponse|ClientErrorResponse|ReauthorizeResponse|ServerErrorResponse|null
	 * @throws \Exception
	 */
	public function getAccountsSummary($most_recent = false)
	{
		if($this->request_id === null)
		{
			throw new \LogicException('You must authorize before using GetAccountsSummary');
		}

		$request = new GetAccountsSummaryRequest();
		$request->setRequestId($this->request_id);
		$request->setMostRecent($most_recent);

		try
		{
			$response = static::getResource()->getAccountsSummary($this->customer_id, $request);
			var_dump($request);
			var_dump($response);

			static::getLogger()->addInfo(get_class($response) . ' for GetAccountsSummary request');
		}
		catch(\Exception $e)
		{
			static::logException($e, $request);
			$response = null;

			throw $e;
		}

		return $response;
	}

	/**
	 * @param bool $most_recent
	 * @param bool $with_account_identity
	 * @param bool $with_transactions
	 *
	 * @return AccountsDetailResponse|ClientErrorResponse|ReauthorizeResponse|ServerErrorResponse|null
	 * @throws \Exception
	 */
	public function getAccountsDetail($most_recent = false, $with_account_identity = true, $with_transactions = true)
	{
		if($this->request_id === null)
		{
			throw new \LogicException('You must authorize before using GetAccountsDetail');
		}

		$request = new GetAccountsDetailRequest();
		$request->setRequestId($this->request_id);
		$request->setWithAccountIdentity($with_account_identity);
		$request->setWithTransactions($with_transactions);
		$request->setMostRecent($most_recent);

		var_dump($request);

		try
		{
			$response = static::getResource()->getAccountsDetail($this->customer_id, $request);
			static::getLogger()->addInfo(get_class($response) . ' for GetAccountsDetail request');
		}
		catch(\Exception $e)
		{
			static::logException($e, $request);
			$response = null;

			throw $e;
		}

		return $response;
	}

	/**
	 * @return BankingServicesV3Resource
	 */
	private static function getResource()
	{
		static $resource;

		if(null === $resource)
		{
			$config = ConfigReader::read();

			$stack = new HandlerStack(new CurlHandler());
			$stack->push(Middleware::redirect(), 'allow_redirects');
			$stack->push(Middleware::prepareBody(), 'prepare_body');

			$http_client     =
				new GuzzleClient(['handler' => $stack, 'base_uri' => $config['Scheme'] . '://' . $config['Host']]);
			$http_adapter    = new GuzzleAdapter($http_client);
			$request_factory = new GuzzleMessageFactory();
			$serializer      = new Serializer(
				NormalizerFactory::create(),
				[
					new JsonEncoder(
						new JsonEncode(),
						new JsonDecode()
					),
					new RawEncoder(),
				]
			);

			$resource = new BankingServicesV3Resource($http_adapter, $request_factory, $serializer);
		}

		return $resource;
	}

	/**
	 * @param \Exception $exception
	 * @param mixed      $request
	 */
	private static function logException(\Exception $exception, $request)
	{
		$message = $exception->getMessage();
		$context = ['trace' => $exception->getTraceAsString(), 'request' => json_encode($request)];

		static::getLogger()->addError($message, $context);
	}

	/**
	 * @return Logger
	 */
	public static function getLogger()
	{
		static $log;

		if(null === $log)
		{
			$config = ConfigReader::read();

			if(array_key_exists('LogglyAppName', $config) && array_key_exists('LogglyToken', $config))
			{
				$app_name  = $config['LogglyAppName'];
				$app_token = $config['LogglyToken'];

				$log     = new Logger($app_name);
				$handler = new LogglyHandler($app_token . '/tag/monolog', Logger::INFO);
			}
			else
			{
				$app_name = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'Unknown app';
				$handler  = new NullHandler(Logger::EMERGENCY);
			}

			$log = new Logger($app_name);
			$log->pushHandler($handler);
		}

		return $log;
	}
}