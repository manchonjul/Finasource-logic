<?php

namespace Flinks\BankingServices\Model;

class AuthorizedResponse
{
    /**
     * @var Login
     */
    protected $login;
    /**
     * @var Account[]
     */
    protected $accounts;
    /**
     * @var bool
     */
    protected $transactionCompleted;
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var int
     */
    protected $httpStatusCode;
    /**
     * @var int
     */
    protected $provider;
    /**
     * @var GeneralExceptionModel
     */
    protected $exception;
    /**
     * @var string
     */
    protected $institution;
    /**
     * @return Login
     */
    public function getLogin()
    {
        return $this->login;
    }
    /**
     * @param Login $login
     *
     * @return self
     */
    public function setLogin(Login $login = null)
    {
        $this->login = $login;
        return $this;
    }
    /**
     * @return Account[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }
    /**
     * @param Account[] $accounts
     *
     * @return self
     */
    public function setAccounts(array $accounts = null)
    {
        $this->accounts = $accounts;
        return $this;
    }
    /**
     * @return bool
     */
    public function getTransactionCompleted()
    {
        return $this->transactionCompleted;
    }
    /**
     * @param bool $transactionCompleted
     *
     * @return self
     */
    public function setTransactionCompleted($transactionCompleted = null)
    {
        $this->transactionCompleted = $transactionCompleted;
        return $this;
    }
    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }
    /**
     * @param string $requestId
     *
     * @return self
     */
    public function setRequestId($requestId = null)
    {
        $this->requestId = $requestId;
        return $this;
    }
    /**
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
    /**
     * @param int $httpStatusCode
     *
     * @return self
     */
    public function setHttpStatusCode($httpStatusCode = null)
    {
        $this->httpStatusCode = $httpStatusCode;
        return $this;
    }
    /**
     * @return int
     */
    public function getProvider()
    {
        return $this->provider;
    }
    /**
     * @param int $provider
     *
     * @return self
     */
    public function setProvider($provider = null)
    {
        $this->provider = $provider;
        return $this;
    }
    /**
     * @return GeneralExceptionModel
     */
    public function getException()
    {
        return $this->exception;
    }
    /**
     * @param GeneralExceptionModel $exception
     *
     * @return self
     */
    public function setException(GeneralExceptionModel $exception = null)
    {
        $this->exception = $exception;
        return $this;
    }
    /**
     * @return string
     */
    public function getInstitution()
    {
        return $this->institution;
    }
    /**
     * @param string $institution
     *
     * @return self
     */
    public function setInstitution($institution = null)
    {
        $this->institution = $institution;
        return $this;
    }
}