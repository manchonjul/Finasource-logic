<?php

namespace Flinks\BankingServices\Model;

class Balance
{
    /**
     * @var float
     */
    protected $available;
    /**
     * @var float
     */
    protected $current;
    /**
     * @var float
     */
    protected $limit;
    /**
     * @return float
     */
    public function getAvailable()
    {
        return $this->available;
    }
    /**
     * @param float $available
     *
     * @return self
     */
    public function setAvailable($available = null)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * @return float
     */
    public function getCurrent()
    {
        return $this->current;
    }
    /**
     * @param float $current
     *
     * @return self
     */
    public function setCurrent($current = null)
    {
        $this->current = $current;
        return $this;
    }
    /**
     * @return float
     */
    public function getLimit()
    {
        return $this->limit;
    }
    /**
     * @param float $limit
     *
     * @return self
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
        return $this;
    }
}