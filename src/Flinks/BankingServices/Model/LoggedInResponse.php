<?php

namespace Flinks\BankingServices\Model;

class LoggedInResponse
{
    /**
     * @var string
     */
    protected $httpStatusCode;
    /**
     * @var Link[]
     */
    protected $links;
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
     * @return Link[]
     */
    public function getLinks()
    {
        return $this->links;
    }
    /**
     * @param Link[] $links
     *
     * @return self
     */
    public function setLinks(array $links = null)
    {
        $this->links = $links;
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