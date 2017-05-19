<?php

namespace Flinks\BankingServices\Model;

class AuthorizeRequest
{
    /**
     * @var string
     */
    protected $loginId;
    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $institution;
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var string
     */
    protected $language;
    /**
     * @var string[][]
     */
    protected $securityResponses;
    /**
     * @var bool
     */
    protected $save;
    /**
     * @var bool
     */
    protected $scheduleRefresh;
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
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param string $username
     *
     * @return self
     */
    public function setUsername($username = null)
    {
        $this->username = $username;
        return $this;
    }
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password = null)
    {
        $this->password = $password;
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
    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * @return string[][]
     */
    public function getSecurityResponses()
    {
        return $this->securityResponses;
    }
    /**
     * @param string[][] $securityResponses
     *
     * @return self
     */
    public function setSecurityResponses(\ArrayObject $securityResponses = null)
    {
        $this->securityResponses = $securityResponses;
        return $this;
    }
    /**
     * @return bool
     */
    public function getSave()
    {
        return $this->save;
    }
    /**
     * @param bool $save
     *
     * @return self
     */
    public function setSave($save = null)
    {
        $this->save = $save;
        return $this;
    }
    /**
     * @return bool
     */
    public function getScheduleRefresh()
    {
        return $this->scheduleRefresh;
    }
    /**
     * @param bool $scheduleRefresh
     *
     * @return self
     */
    public function setScheduleRefresh($scheduleRefresh = null)
    {
        $this->scheduleRefresh = $scheduleRefresh;
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