<?php

namespace Flinks\BankingServices\Model;

class AccountsDetailResponse
{
    /**
     * @var string
     */
    protected $httpStatusCode;
    /**
     * @var AccountWithDetails[]
     */
    protected $accounts;
    /**
     * @var Login
     */
    protected $login;
    /**
     * @var string
     */
    protected $institution;
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @return string
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
    /**
     * @param string $httpStatusCode
     *
     * @return self
     */
    public function setHttpStatusCode($httpStatusCode = null)
    {
        $this->httpStatusCode = $httpStatusCode;
        return $this;
    }
    /**
     * @return AccountWithDetails[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }
    /**
     * @param AccountWithDetails[] $accounts
     *
     * @return self
     */
    public function setAccounts(array $accounts = null)
    {
        $this->accounts = $accounts;
        return $this;
    }
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
}