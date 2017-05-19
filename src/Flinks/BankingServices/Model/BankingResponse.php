<?php

namespace Flinks\BankingServices\Model;

class BankingResponse
{
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var int
     */
    protected $httpStatusCode;
    /**
     * @var string
     */
    protected $institution;
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