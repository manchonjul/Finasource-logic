<?php

namespace Flinks\BankingServices\Model;

class GetAccountsDetailRequest
{
    /**
     * @var bool
     */
    protected $withAccountIdentity;
    /**
     * @var bool
     */
    protected $withTransactions;
    /**
     * @var string[]
     */
    protected $accountsFilter;
    /**
     * @var string
     */
    protected $daysOfTransactions;
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var bool
     */
    protected $mostRecent;
    /**
     * @var string
     */
    protected $customerId;
    /**
     * @var string
     */
    protected $provider;
    /**
     * @return bool
     */
    public function getWithAccountIdentity()
    {
        return $this->withAccountIdentity;
    }
    /**
     * @param bool $withAccountIdentity
     *
     * @return self
     */
    public function setWithAccountIdentity($withAccountIdentity = null)
    {
        $this->withAccountIdentity = $withAccountIdentity;
        return $this;
    }
    /**
     * @return bool
     */
    public function getWithTransactions()
    {
        return $this->withTransactions;
    }
    /**
     * @param bool $withTransactions
     *
     * @return self
     */
    public function setWithTransactions($withTransactions = null)
    {
        $this->withTransactions = $withTransactions;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getAccountsFilter()
    {
        return $this->accountsFilter;
    }
    /**
     * @param string[] $accountsFilter
     *
     * @return self
     */
    public function setAccountsFilter(array $accountsFilter = null)
    {
        $this->accountsFilter = $accountsFilter;
        return $this;
    }
    /**
     * @return string
     */
    public function getDaysOfTransactions()
    {
        return $this->daysOfTransactions;
    }
    /**
     * @param string $daysOfTransactions
     *
     * @return self
     */
    public function setDaysOfTransactions($daysOfTransactions = null)
    {
        $this->daysOfTransactions = $daysOfTransactions;
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
     * @return bool
     */
    public function getMostRecent()
    {
        return $this->mostRecent;
    }
    /**
     * @param bool $mostRecent
     *
     * @return self
     */
    public function setMostRecent($mostRecent = null)
    {
        $this->mostRecent = $mostRecent;
        return $this;
    }
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }
    /**
     * @param string $customerId
     *
     * @return self
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
        return $this;
    }
    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }
    /**
     * @param string $provider
     *
     * @return self
     */
    public function setProvider($provider = null)
    {
        $this->provider = $provider;
        return $this;
    }
}