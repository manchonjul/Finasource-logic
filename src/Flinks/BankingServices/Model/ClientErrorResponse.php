<?php

namespace Flinks\BankingServices\Model;

class ClientErrorResponse
{
    /**
     * @var int
     */
    protected $httpStatusCode;
    /**
     * @var string
     */
    protected $flinksCode;
    /**
     * @var string[][]
     */
    protected $validationDetails;
    /**
     * @var string
     */
    protected $requestId;
    /**
     * @var string
     */
    protected $institution;
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
     * @return string[][]
     */
    public function getValidationDetails()
    {
        return $this->validationDetails;
    }
    /**
     * @param string[][] $validationDetails
     *
     * @return self
     */
    public function setValidationDetails(array $validationDetails = null)
    {
        $this->validationDetails = $validationDetails;
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