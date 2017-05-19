<?php

namespace Flinks\BankingServices\Resource;

use Flinks\ConfigReader;
use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;
use Psr\Http\Message\ResponseInterface;

class BankingServicesV3Resource extends Resource
{
	/**
	 *
	 *
	 * @param string $customerId
	 * @param \Flinks\BankingServices\Model\AuthorizeRequest $authorizeRequest
	 * @param array  $parameters List of parameters
	 * @param string $fetch      Fetch mode (object or response)
	 *
	 * @return \Psr\Http\Message\ResponseInterface|\Flinks\BankingServices\Model\LoggedInResponse|\Flinks\BankingServices\Model\ChallengeResponse|\Flinks\BankingServices\Model\ReauthorizeResponse
	 */
	public function authorize($customerId, \Flinks\BankingServices\Model\AuthorizeRequest $authorizeRequest, $parameters = array(), $fetch = self::FETCH_OBJECT)
	{
		$queryParam = new QueryParam();
		$url = ConfigReader::read()['Scheme'].'://'.ConfigReader::read()['Host'].'/v3/{customerId}/BankingServices/Authorize';
		$url = str_replace('{customerId}', urlencode($customerId), $url);
		$url = $url . ('?' . $queryParam->buildQueryString($parameters));
		$headers = array_merge(array('Host' => ConfigReader::read()['Host'], 'Content-Type' => 'application/json; charset=utf-8'), $queryParam->buildHeaders($parameters));
		$body = $this->serializer->serialize($authorizeRequest, 'json');
		$request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
		$promise = $this->httpClient->sendAsyncRequest($request);
		if (self::FETCH_PROMISE === $fetch) {
			return $promise;
		}
		$response = $promise->wait();
		if (self::FETCH_OBJECT == $fetch) {
			if ('200' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\LoggedInResponse', 'json');
			}
			if ('203' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ChallengeResponse', 'json');
			}
			if ('401' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ReauthorizeResponse', 'json');
			}
			if ('400' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ClientErrorResponse', 'json');
			}
			if ('500' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ServerErrorResponse', 'json');
			}
		}
		return $response;
	}
	/**
	 *
	 *
	 * @param string $customerId
	 * @param \Flinks\BankingServices\Model\GetAccountsSummaryRequest $getAccountsSummaryRequest
	 * @param array  $parameters List of parameters
	 * @param string $fetch      Fetch mode (object or response)
	 *
	 * @return \Psr\Http\Message\ResponseInterface|\Flinks\BankingServices\Model\AccountsSummaryResponse|\Flinks\BankingServices\Model\ReauthorizeResponse
	 */
	public function getAccountsSummary($customerId, \Flinks\BankingServices\Model\GetAccountsSummaryRequest $getAccountsSummaryRequest, $parameters = array(), $fetch = self::FETCH_OBJECT)
	{
		$queryParam = new QueryParam();
		$url = ConfigReader::read()['Scheme'].'://'.ConfigReader::read()['Host'].'/v3/{customerId}/BankingServices/GetAccountsSummary';
		$url = str_replace('{customerId}', urlencode($customerId), $url);
		$url = $url . ('?' . $queryParam->buildQueryString($parameters));
		$headers = array_merge(array('Host' => ConfigReader::read()['Host'], 'Content-Type' => 'application/json; charset=utf-8'), $queryParam->buildHeaders($parameters));
		$body = $this->serializer->serialize($getAccountsSummaryRequest, 'json');
		$request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
		$promise = $this->httpClient->sendAsyncRequest($request);
		if (self::FETCH_PROMISE === $fetch) {
			return $promise;
		}
		$response = $promise->wait();
		if (self::FETCH_OBJECT == $fetch) {
			if ('200' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\AccountsSummaryResponse', 'json');
			}
			if ('401' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ReauthorizeResponse', 'json');
			}
			if ('400' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ClientErrorResponse', 'json');
			}
			if ('500' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ServerErrorResponse', 'json');
			}
		}
		return $response;
	}
	/**
	 *
	 *
	 * @param string $customerId
	 * @param \Flinks\BankingServices\Model\GetAccountsDetailRequest $getAccountsDetailRequest
	 * @param array  $parameters List of parameters
	 * @param string $fetch      Fetch mode (object or response)
	 *
	 * @return \Psr\Http\Message\ResponseInterface|\Flinks\BankingServices\Model\AccountsDetailResponse|\Flinks\BankingServices\Model\ReauthorizeResponse
	 */
	public function getAccountsDetail($customerId, \Flinks\BankingServices\Model\GetAccountsDetailRequest $getAccountsDetailRequest, $parameters = array(), $fetch = self::FETCH_OBJECT)
	{
		$queryParam = new QueryParam();
		$url = ConfigReader::read()['Scheme'].'://'.ConfigReader::read()['Host'].'/v3/{customerId}/BankingServices/GetAccountsDetail';
		$url = str_replace('{customerId}', urlencode($customerId), $url);
		$url = $url . ('?' . $queryParam->buildQueryString($parameters));
		$headers = array_merge(array('Host' => ConfigReader::read()['Host'], 'Content-Type' => 'application/json; charset=utf-8'), $queryParam->buildHeaders($parameters));
		$body = $this->serializer->serialize($getAccountsDetailRequest, 'json');
		$request = $this->messageFactory->createRequest('POST', $url, $headers, $body);
		$promise = $this->httpClient->sendAsyncRequest($request);
		if (self::FETCH_PROMISE === $fetch) {
			return $promise;
		}
		$response = $promise->wait();
		if (self::FETCH_OBJECT == $fetch) {
			if ('200' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\AccountsDetailResponse', 'json');
			}
			if ('401' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ReauthorizeResponse', 'json');
			}
			if ('400' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ClientErrorResponse', 'json');
			}
			if ('500' == $response->getStatusCode()) {
				return $this->serializer->deserialize(static::readJsonFromResponse($response), 'Flinks\\BankingServices\\Model\\ServerErrorResponse', 'json');
			}
		}
		return $response;
	}
	/**
	 *
	 *
	 * @param string $customerId
	 * @param array  $parameters {
	 *     @var string $loginId
	 * }
	 * @param string $fetch      Fetch mode (object or response)
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function activateScheduledRefresh($customerId, $parameters = array(), $fetch = self::FETCH_OBJECT)
	{
		$queryParam = new QueryParam();
		$queryParam->setRequired('loginId');
		$url = ConfigReader::read()['Scheme'].'://'.ConfigReader::read()['Host'].'/v3/{customerId}/BankingServices/Authorize';
		$url = str_replace('{customerId}', urlencode($customerId), $url);
		$url = $url . ('?' . $queryParam->buildQueryString($parameters));
		$headers = array_merge(array('Host' => ConfigReader::read()['Host'], 'Content-Type' => 'application/json; charset=utf-8'), $queryParam->buildHeaders($parameters));
		$body = $queryParam->buildFormDataString($parameters);
		$request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
		$promise = $this->httpClient->sendAsyncRequest($request);
		if (self::FETCH_PROMISE === $fetch) {
			return $promise;
		}
		$response = $promise->wait();
		return $response;
	}

	private static function readJsonFromResponse(ResponseInterface $response)
	{
		$json = (string) $response->getBody();
		$json = str_replace(['"00000000-0000-0000-0000-000000000000"', '"0001-01-01T00:00:00"'], "null", $json);

		echo "\n\n{$json}\n\n";

		return $json;
	}
}