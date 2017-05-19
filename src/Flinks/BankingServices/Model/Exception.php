<?php

namespace Flinks\BankingServices\Model;

class Exception
{
    /**
     * @var string
     */
    protected $message;
    /**
     * @var Exception
     */
    protected $innerException;
    /**
     * @var string
     */
    protected $stackTrace;
    /**
     * @var string
     */
    protected $source;
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
    public function getInnerException()
    {
        return $this->innerException;
    }
    /**
     * @param Exception $innerException
     *
     * @return self
     */
    public function setInnerException(Exception $innerException = null)
    {
        $this->innerException = $innerException;
        return $this;
    }
    /**
     * @return string
     */
    public function getStackTrace()
    {
        return $this->stackTrace;
    }
    /**
     * @param string $stackTrace
     *
     * @return self
     */
    public function setStackTrace($stackTrace = null)
    {
        $this->stackTrace = $stackTrace;
        return $this;
    }
    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
    /**
     * @param string $source
     *
     * @return self
     */
    public function setSource($source = null)
    {
        $this->source = $source;
        return $this;
    }
}