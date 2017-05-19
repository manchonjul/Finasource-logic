<?php

namespace Flinks\BankingServices\Model;

class GetAccountsSummaryRequest
{
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