<?php

namespace Flinks\BankingServices\Model;

class AuthorizedRequest
{
    /**
     * @var bool
     */
    protected $mostRecent;
    /**
     * @var string
     */
    protected $loginId;
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var string
     */
    protected $institution;
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
    public function getLoginId()
    {
        return $this->loginId;
    }
    /**
     * @param string $loginId
     *
     * @return self
     */
    public function setLoginId($loginId = null)
    {
        $this->loginId = $loginId;
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