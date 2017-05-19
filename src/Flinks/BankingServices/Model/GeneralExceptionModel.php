<?php

namespace Flinks\BankingServices\Model;

class GeneralExceptionModel
{
    /**
     * @var int
     */
    protected $httpCode;
    /**
     * @var string
     */
    protected $flinksCode;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var Exception
     */
    protected $exception;
    /**
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }
    /**
     * @param int $httpCode
     *
     * @return self
     */
    public function setHttpCode($httpCode = null)
    {
        $this->httpCode = $httpCode;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * @param string $message
     *
     * @return self
     */
    public function setMessage($message = null)
    {
        $this->message = $message;
        return $this;
    }
    /**
     * @return Exception
     */
    public function getException()
    {
        return $this->exception;
    }
    /**
     * @param Exception $exception
     *
     * @return self
     */
    public function setException(Exception $exception = null)
    {
        $this->exception = $exception;
        return $this;
    }
}