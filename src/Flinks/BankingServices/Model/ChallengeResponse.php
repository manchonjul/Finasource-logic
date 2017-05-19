<?php

namespace Flinks\BankingServices\Model;

class ChallengeResponse
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
     * @var string
     */
    protected $flinksCode;
    /**
     * @var SecurityChallenge[]
     */
    protected $securityChallenges;
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
     * @return string
     */
    public function getFlinksCode()
    {
        return $this->flinksCode;
    }
    /**
     * @param string $flinksCode
     *
     * @return self
     */
    public function setFlinksCode($flinksCode = null)
    {
        $this->flinksCode = $flinksCode;
        return $this;
    }
    /**
     * @return SecurityChallenge[]
     */
    public function getSecurityChallenges()
    {
        return $this->securityChallenges;
    }
    /**
     * @param SecurityChallenge[] $securityChallenges
     *
     * @return self
     */
    public function setSecurityChallenges(array $securityChallenges = null)
    {
        $this->securityChallenges = $securityChallenges;
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